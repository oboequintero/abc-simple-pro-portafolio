<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Storage;

use App\ContenidoModel;


class ContenidoController extends Controller
{
    private $path ='vendor.adminlte.contenido';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $id_plantilla=Input::get('id_plantilla');

            if($id_plantilla){

                $contenido = DB::table('Contenido as c')
                                ->join('Plantillas as p', 'p.id_plantilla', '=', 'c.id_plantilla')
                                ->join(DB::raw("(SELECT l.id_leccion, l.nombre as leccion, p.id_plantilla, p.nombre as plantilla FROM Lecciones as l join Plantillas as p on l.id_leccion = p.id_leccion) as lecc"),
                                function($join){
                                                $join->on('lecc.id_plantilla','=','c.id_plantilla');
                                                })
                                ->select('c.id_contenido', 'c.id_plantilla', 'c.idhtml','c.nombre', 'c.descripcion', 'lecc.id_leccion', 'lecc.leccion', 'p.nombre as plantilla', 'c.tamano', 'c.ruta', 'c.parrafo'
                                            , 'c.tiempo', 'c.activo','p.pagina','c.id_tipo_con')
                                ->where('p.id_plantilla', '=', $id_plantilla )
                                ->get();
                $plantilla=DB::table('Plantillas')->where('id_plantilla', '=', $id_plantilla)->first();
                $leccion=DB::table('Lecciones')->where('id_leccion', '=', $plantilla->id_leccion)->first();
                $nivel=DB::table('Niveles')->where('id_nivel', '=', $leccion->id_nivel)->first();
                $curso=DB::table('Cursos')->where('id_curso', '=', $nivel->id_curso)->first();
                $idioma=DB::table('Idiomas')->where('id_idioma', '=', $curso->id_idioma)->first();

            }
            else{

                $contenido = DB::table('Contenido as c')
                ->join('Plantillas as p', 'p.id_plantilla', '=', 'c.id_plantilla')
                ->join(DB::raw("(SELECT l.id_leccion, l.nombre as leccion, p.id_plantilla, p.nombre as plantilla FROM Lecciones as l join Plantillas as p on l.id_leccion = p.id_leccion) as lecc"),
                 function($join){
                                $join->on('lecc.id_plantilla','=','c.id_plantilla');
                                })
                ->select('c.id_contenido', 'c.id_plantilla', 'c.idhtml','c.nombre', 'c.descripcion', 'lecc.id_leccion', 'lecc.leccion', 'p.nombre as plantilla', 'c.tamano', 'c.ruta', 'c.parrafo'
                                , 'c.tiempo', 'c.activo','p.pagina','c.id_tipo_con')
                ->get();
            }

            if(!is_null($contenido)){
                return view($this->path . '.index',
                        compact('contenido','id_plantilla','plantilla','leccion','nivel','idioma','curso'));
            }
            else{
                return response('Data no encontrada.', 404);
            }

        }
            catch(exception $e){
                return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Input::get('id_plantilla');
		if($id==0){
		    //Obtener y mostrar las plantillas existentes y activas
            $plantillas = DB::table('Plantillas')
            ->select('id_plantilla', 'nombre as plantilla')
            ->orderby('id_plantilla')
            ->where('activo', true)
            ->get();

        }
        //Obtener los tipos de contenidos activos
        $tipo_contenido = DB::table('Tipo_Contenido')
        ->select('id_tipo_con', 'nombre')
        ->orderby('nombre')
        ->where('activo', true)
        ->get();
        return view($this->path . ".create", compact('plantillas','id','tipo_contenido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         try{

            $nombre='';
            $file = $request->file('input-b1');

            if($file){
                //obtenemos el nombre del archivo
                $nombre = $file->getClientOriginalName();
                if (Storage::exists($nombre))
                {
                    Storage::delete($nombre);
                }
                //indicamos que queremos guardar un nuevo archivo en el disco local
                Storage::disk('local')->put($nombre,  \File::get($file));
            }

            //verificamos el nombre del archivo  y lo borramos si existe

            $contenido = new ContenidoModel();

            $id = Input::get('id_plantilla');
            if($id==0){
                $id=$request->idplantilla;
            }
            $contenido->id_plantilla  = $id;
            $contenido->idhtml        = $request->idhtml;
            $contenido->nombre        = $request->nombre;
            $contenido->tamano          = $request->tamano;
            $contenido->descripcion   = $request->descripcion;
            $contenido->ruta          = $nombre;
            $contenido->parrafo       = $request->parrafo;
            $contenido->tiempo        = $request->tiempo;
            $contenido->activo        = $request->status;

            $contenido->id_tipo_con   = $request->tipo_contenido;

            $contenido->save();


            return redirect()->route('contenido.index');

        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_plantilla)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $error_msg = "";  
        $_class    = "";
        # commit de prueba
        try{
            $contenido = ContenidoModel::find($id);
            $tipo_c = DB::table('Tipo_Contenido')->get();

            if (!is_null($contenido))
            {
                return view($this->path . '.edit', compact('contenido','tipo_c','error_msg', '_class'));
                }
            else{
                return response('Data no existe.', 404);
            }
        }
        catch(exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // return "update";
        try{

            $nombre='';
            $file = $request->file('input-b1');
            $contenido = ContenidoModel::findorFail($id);
            if($file){
                //obtenemos el nombre del archivo
                $nombre = $file->getClientOriginalName();

                if (Storage::exists($contenido->ruta ))
                {
                    Storage::delete($contenido->ruta );
                }
                //indicamos que queremos guardar un nuevo archivo en el disco local
                Storage::disk('local')->put($nombre,  \File::get($file));
            }
            $contenido->id_plantilla  = $request->idplantilla;
            $contenido->idhtml        = $request->idhtml;
            $contenido->nombre        = $request->nombre;
            $contenido->tamano        = $request->tamano;
            $contenido->descripcion   = $request->descripcion;
            $contenido->ruta          = $nombre;
            $contenido->parrafo       = $request->parrafo;
            $contenido->tiempo        = $request->tiempo;
            $contenido->activo        = $request->status;
            $contenido->color         = $request->color;
            if (!($request->negrita)) {
                $request->negrita=0;
            }
            $contenido->negrita       = $request->negrita;
            if (!($request->fin_s)) {
                $request->fin_s=0;
            }
            $contenido->fin_s         = $request->fin_s;
            $contenido->id_tipo_con   = $request->tipo_contenido;

            $contenido->save();

            return redirect()->route('contenido.index');

        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

	public function buscacontenido()
    {
        //
        try{

			$codigo         =  Input::get('b_contenido');
            $id_plantilla	=  Input::get('id_plantilla');

			$contenido = DB::select('SELECT c.id_contenido, c.id_plantilla, c.idhtml,c.nombre,c.descripcion,
                                       lecc.id_leccion, lecc.nombre as leccion, p.nombre as plantilla, c.tamano, c.ruta,
                                       c.parrafo,c.tiempo,c.activo,p.pagina
								FROM Contenido AS c
								INNER JOIN Plantillas as p ON p.id_plantilla = c.id_plantilla
								INNER JOIN Lecciones as lecc ON lecc.id_leccion = p.id_leccion
								WHERE (c.idhtml = :_html) OR (p.nombre = :_nomb)
                                        OR (p.pagina = :_pag)',
										['_html'=>$codigo, '_nomb'=>$codigo, '_pag'=>$codigo]);
			if($id_plantilla){
				$plantilla=DB::table('Plantillas')->where('id_plantilla', '=', $id_plantilla)->first();
                $leccion=DB::table('Lecciones')->where('id_leccion', '=', $plantilla->id_leccion)->first();
                $nivel=DB::table('Niveles')->where('id_nivel', '=', $leccion->id_nivel)->first();
                $curso=DB::table('Cursos')->where('id_curso', '=', $nivel->id_curso)->first();
                $idioma=DB::table('Idiomas')->where('id_idioma', '=', $curso->id_idioma)->first();
			}

            if(!is_null($contenido)){
                return view($this->path.'.show', compact('contenido','id_plantilla','leccion','nivel','idioma','curso','plantilla'));
            }
            else{
            //return response('Data no encontrada, 404');
                return view($this->path.'.show', compact('contenido','id_plantilla','leccion','nivel','idioma','curso','plantilla'));
            }
        }
        catch (exception$e){
            return $e->getMessage();
        }
	}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request)
    {

		$id =Input::get('identidad');

		return $this->destroy($id);


	}

	public function destroy($id){

		try{
			$contenido = ContenidoModel::findOrFail($id);
			$contenido->delete();
			return response()->json(array('msg'=> $id,'datos'=> $id), 200);
		}
		catch(Exception $e){

			return $e->getMessage();

		}

	}
}
