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
        $error_msg = ""; 
        $_class    = "";
        $_idhtml     = "";
        $_nomb     = ""; 
        $_descrip  = "";
        $_tamano     = "";
        $_parrafo     = "";
        $_tiempo     = "";
        $_fin     = "";
        $_margen_superior   = "";
        $_margen_inferior   = "";
        

        

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

        $id_plantilla=Input::get('id_plantilla');

            if($id_plantilla){

                
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

 

        return view($this->path . ".create", compact('plantillas','id','tipo_contenido','error_msg','_class','_idhtml','_nomb','_descrip','_tamano','_parrafo','_tiempo','_id_plantilla','_fin','_margen_superior','_margen_inferior'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(Request $request)
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
            $contenido->color         = $request->color;
            
            if (!($request->negrita)) {
                $request->negrita=0;
            }
            $contenido->negrita       = $request->negrita;
            #dd ($request);
            if (!($request->fin_s)) {
                $request->fin_s=0;
            }
            $contenido->fin_s             = $request->fin_s;

            $contenido->id_tipo_con       = $request->tipo_contenido;

            $contenido->margen_superior   = $request->margen_superior;

            $contenido->margen_inferior   = $request->margen_inferior;

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

    public function store(Request $request){
          
        $error_msg = ""; 
        $_class    = "";

        $_idhtml     = $request->idhtml;
        $_nomb     = $request->nombre; 
        $_descrip  = $request->descripcion;
        $_tamano     = $request->tamano;
        $_parrafo     = $request->parrafo;
        $_tiempo     = $request->tiempo;
        $_fin     = $request->fin_s;
        $_margen_superior     = $request->margen_superior;
        $_margen_inferior     = $request->margen_inferior;

        if($request->id==0)
            {
                $id=$request->idplantilla;
            }
        else{
                $id=$request->id;
            }
    


        
            //Obtener y mostrar las plantillas existentes y activas
            $plantillas = DB::table('Plantillas')
            ->select('id_plantilla', 'nombre as plantilla')
            ->orderby('id_plantilla')
            ->where('activo', true)
            ->get();

        
        //Obtener los tipos de contenidos activos
        $tipo_contenido = DB::table('Tipo_Contenido')
        ->select('id_tipo_con', 'nombre')
        ->orderby('nombre')
        ->where('activo', true)
        ->get();
        
        
        $contenido = new ContenidoModel();

        $id_plantilla=$id;

        $tipo_c = DB::table('Tipo_Contenido')->get();


            $nombre='';
            $file = $request->file('input-b1');

            if($file){
                //obtenemos el nombre del archivo
                $nombre = $file->getClientOriginalName();
                #
                if (Storage::exists($contenido->ruta))
                {
                    Storage::delete($contenido->ruta);
                }
                #dd($nombre);
                //indicamos que queremos guardar un nuevo archivo en el disco local
                Storage::disk('local')->put($nombre,  \File::get($file));
            }

            //verificamos el nombre del archivo  y lo borramos si existe

        if($this->validadata($request, $msg,1)){
         try{

            $contenido->id_plantilla  = $id;
            $contenido->idhtml        = $request->idhtml;
            $contenido->nombre        = $request->nombre;
            $contenido->tamano          = $request->tamano;
            $contenido->descripcion   = $request->descripcion;
            $contenido->ruta          = $nombre;
            $contenido->parrafo       = $request->parrafo;
            $contenido->tiempo        = $request->tiempo;
            $contenido->activo        = $request->status;
            $contenido->color         = $request->color;

            $contenido->margen_superior  = $request->margen_superior;
            $contenido->margen_inferior  = $request->margen_inferior;
            
            if (!($request->negrita)) {
                $request->negrita=0;
            }
            $contenido->negrita       = $request->negrita;
            #dd ($request->fin_s);
            if (!($request->fin_s)) {
                $request->fin_s=0;
            }
            $contenido->fin_s         = $request->fin_s;

            $contenido->id_tipo_con   = $request->tipo_contenido;

            $contenido->save();

             $_idhtml     = "";
             $_nomb     = ""; 
             $_descrip  = "";
             $_tamano     = "";
             $_parrafo     = "";
             $_tiempo     = "";
             $_fin     = "";
             $_margen_superior     = "";
             $_margen_inferior     = "";
                
            $_class = "alert alert-success";
            $error_msg = "Registrado correctamente."; 

           return view($this->path . '.create', compact('plantillas','id','tipo_contenido','error_msg','_class','_idhtml','_nomb','_descrip','_tamano','_parrafo','_tiempo','_fin','_margen_superior','_margen_inferior'));   


            }
            catch(Exception $e){

                return $e->getMessage();
            }

        }
       
        else{
            $error_msg = $msg; 
            $_class    = "alert alert-warning";
  
             return view($this->path . '.create', compact('plantillas','id','tipo_contenido','error_msg','_class','_idhtml','_nomb','_descrip','_tamano','_parrafo','_tiempo','_fin','_margen_superior','_margen_inferior'));  

            }

    }

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
  
        try{
            $contenido = ContenidoModel::find($id);
            $tipo_c = DB::table('Tipo_Contenido')->get();

            $id_plantilla=$contenido->id_plantilla;

            $plantilla=DB::table('Plantillas')->where('id_plantilla', '=', $id_plantilla)->first();
            $leccion=DB::table('Lecciones')->where('id_leccion', '=', $plantilla->id_leccion)->first();
            $nivel=DB::table('Niveles')->where('id_nivel', '=', $leccion->id_nivel)->first();
            $curso=DB::table('Cursos')->where('id_curso', '=', $nivel->id_curso)->first();
            $idioma=DB::table('Idiomas')->where('id_idioma', '=', $curso->id_idioma)->first();


            if (!is_null($contenido))
            {
                return view($this->path . '.edit', compact('contenido','tipo_c','error_msg', '_class','plantilla','leccion','nivel','idioma','curso','id_plantilla'));
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
    public function update1(Request $request, $id)
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

    function validadata($request, &$msg, $aux){

        $id=$request->id_contenido;
        $idhtml=$request->idhtml;

        $nomb = $request->nombre;

         $data=DB::table('Contenido')->where('nombre', '=', $request->nombre)->first();
        $data2=DB::table('Contenido')->where('idhtml', '=', $request->idhtml)->first();
       
        $data_aux = DB::select('SELECT *
                                    FROM Contenido AS p
                                    WHERE  p.nombre = :_nomb',
                                    ['_nomb'=>$nomb]);
        $data_aux2 = DB::select('SELECT *
                                    FROM Contenido AS p
                                    WHERE  p.idhtml = :_idhtml',
                                    ['_idhtml'=>$idhtml]); 

       if ($aux == 1)
       {

/*
        if(empty($data_aux[0]->id_contenido) or is_null($data_aux[0]->id_contenido)){             
            
            return true;
        }
        elseif(empty($data_aux2[0]->id_contenido) or is_null($data_aux2[0]->id_contenido)){            
            
            return true;
        }
        else
        {$msg = "Data Inválida. No debe repetirse nombre o idhtml del cotenido"; 
            return false;} */
         if($data){
            
            $msg = "Data Inválida. No debe repetirse nombre del cotenido"; 
            return false;
        }

         elseif($data2){
            
            $msg = "Data Inválida. No debe repetirse Idhtml del cotenido"; 
            return false;
        }
         else
           return true; 

       }

       elseif ($aux == 0)
       { # Se valida : si el nombre es el mismo, el id de contenido tambien debe ser igual

              
        if(empty($data_aux[0]->id_contenido) or is_null($data_aux[0]->id_contenido)){
        # Para este error Undefined offset: 0 en caso de modificar por un nombre nuevo y no uno que ya existe.             
            
            return true;
        }
        elseif(empty($data_aux2[0]->id_contenido) or is_null($data_aux2[0]->id_contenido)){
        # Para este error Undefined offset: 0 en caso de modificar por un idhtml nuevo y no uno que ya existe.             
            
            return true;
        }
          elseif($data_aux[0]->id_contenido != $id ){
            $msg = "Data Inválida. No debe repetirse nombre del cotenido";
            
            return false;
             }

          elseif($data_aux2[0]->id_contenido != $id ){
            $msg = "Data Inválida. No debe repetirse idhtml del cotenido";
            
            return false;
             }
        
          else
           return true;
        
       }# AUX 0 */

    #return true;
                
    }


    public function update(Request $request, $id){
          
        $error_msg = ""; 
       
        $_class    = "";
        
        $nombre=''; 
        
        $contenido = ContenidoModel::find($id);

        $id_plantilla=$contenido->id_plantilla;

        $plantilla=DB::table('Plantillas')->where('id_plantilla', '=', $id_plantilla)->first();
        $leccion=DB::table('Lecciones')->where('id_leccion', '=', $plantilla->id_leccion)->first();
        $nivel=DB::table('Niveles')->where('id_nivel', '=', $leccion->id_nivel)->first();
        $curso=DB::table('Cursos')->where('id_curso', '=', $nivel->id_curso)->first();
        $idioma=DB::table('Idiomas')->where('id_idioma', '=', $curso->id_idioma)->first();

               
        $file = $request->file('input-b1');
        
        $tipo_c = DB::table('Tipo_Contenido')->get();

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

        if($this->validadata($request, $msg,0)){
         try{

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
            $contenido->margen_superior   = $request->margen_superior;
            $contenido->margen_inferior   = $request->margen_inferior;
            
            #dd ($request->idhtml);
            $contenido->save();
                
            $_class = "alert alert-success";
            $error_msg = "Actualizado correctamente."; 

           return view($this->path . '.edit', compact('contenido','tipo_c','error_msg', '_class','plantilla','leccion','nivel','idioma','curso','id_plantilla','id'));  


            }
            catch(Exception $e){

                return $e->getMessage();
            }

        }
       
        else{
            $error_msg = $msg; 
            $_class    = "alert alert-warning";
  
             return view($this->path . '.edit', compact('contenido','tipo_c','error_msg', '_class','plantilla','leccion','nivel','idioma','curso','id_plantilla','id'));  

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
