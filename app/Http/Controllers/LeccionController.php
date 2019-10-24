<?php

namespace App\Http\Controllers;


use App\Idiomas;
use App\Cursos;
use App\Lecciones;
use App\Niveles;

use Illuminate\Http\Request;

use App\Http\Requests;


use View;
use Redirect;

use DB;
use Illuminate\Support\Facades\Input;
use Exception;



class LeccionController extends Controller
{
	private $path ='vendor.adminlte.leccion';

    public function index(){

		$id_nivel=Input::get('id_nivel');


		if($id_nivel){

			$data = DB::select('SELECT L.id_leccion AS id_leccion,N.id_nivel AS id_nivel, N.nombre AS nombre_N,
									   L.codigo AS codigo_L, L.nombre AS nombre_L, L.descripcion AS descripcion_L,
									   L.activo AS activo_L
									   FROM Niveles as N INNER JOIN Lecciones AS L 	on N.id_nivel =	L.id_nivel
								WHERE (L.id_nivel  = ?) ORDER BY L.codigo', [$id_nivel]);

			$leccion=DB::table('Lecciones')->where('id_nivel','=',$id_nivel)->first();
			$nivel=DB::table('Niveles')->where('id_nivel', '=', $id_nivel)->first();
			$curso=DB::table('Cursos')->where('id_curso', '=', $nivel->id_curso)->first();
			$idioma=DB::table('Idiomas')->where('id_idioma', '=', $curso->id_idioma)->first();

		}
		else{

			$data = DB::select('SELECT L.id_leccion AS id_leccion,N.id_nivel AS id_nivel, N.nombre AS nombre_N,
								L.codigo AS codigo_L, L.nombre AS nombre_L, L.descripcion AS descripcion_L,
								L.activo AS activo_L
								FROM Niveles as N INNER JOIN Lecciones AS L on N.id_nivel =	L.id_nivel
	 							ORDER BY L.codigo');


		}

	   	return view($this->path.'.index', compact('data','id_nivel','nivel','curso','idioma','leccion'));

	}


	public function show($id_nivel){


	}


    public function create(){

		$id_nivel = Input::get('id_nivel');

        $error_msg = "";        
        $_cod      = ""; 
        $_nomb     = ""; 
        $_descrip  = "";
        $_ruta     = "";
        
        $_class    = "";


		if($id_nivel==0){
			$data = Niveles::all();
		}
		else{
			$data = DB::table('Niveles AS N')
						->join('Lecciones AS L', 'N.id_nivel', '=', 'L.id_nivel')
						->select('L.id_leccion AS id_leccion','N.id_nivel AS id_nivel','N.nombre AS nombre_N'	, 'L.codigo AS codigo_L'
						,'L.nombre AS nombre_L','L.descripcion AS descripcion_L'
						,'L.activo AS activo_L')
						->where('L.id_nivel', '=', $id_nivel )
						->get();
			$leccion=DB::table('Lecciones')->where('id_nivel','=',$id_nivel)->first();
			$nivel=DB::table('Niveles')->where('id_nivel', '=', $id_nivel)->first();
			$curso=DB::table('Cursos')->where('id_curso', '=', $nivel->id_curso)->first();
			$idioma=DB::table('Idiomas')->where('id_idioma', '=', $curso->id_idioma)->first();
		}
		return view($this->path.'.create', compact('data','id_nivel','nivel','curso','idioma','leccion','error_msg','_cod', '_nomb', '_descrip', '_ruta', '_class'));
    }

	function validadata($request, &$msg, $aux){
      
	   $codigo=DB::table('Lecciones')->where('codigo', '=', $request->codigo)->first();


       if($request->id_nivel==0)
            {
                $id=$request->lista_id_nivel;
                
            }
         else{
                $id=$request->id_nivel;
                 
            }

         $nomb=$request->nombre_leccion;
         $codigo=$request->codigo;

       if ($aux==1) {

         #No debe repetirse la combinacion de leccion y nombre, pero si se puede repetir el mismo nombre para DIFERENTES NIVELES

         $nombre = DB::select('SELECT *
                                    FROM Lecciones AS p
                                    WHERE (p.id_nivel = :_id) AND (p.nombre = :_nomb)',
                                    ['_id'=>$id, '_nomb'=>$nomb]);
      

        if($codigo){
            $msg = "Código de Lección duplicado. Introduzca un código válido.";           
            return false;
        }
        else

        if($nombre){
            $msg = "Nombre de Lección duplicado para Nivel Seleccionado. Introduzca un nombre válido.";           
            return false;
        }

       } # aux 1
      elseif ($aux == 0)

         {

         #dd ($nomb );
         #dd ($id);
         $data = DB::select('SELECT *
                                    FROM Lecciones AS p
                                    WHERE (p.id_nivel = :_id) AND (p.nombre = :_nomb)',
                                    ['_id'=>$id, '_nomb'=>$nomb]);

        #------------------
        if(empty($data[0]->codigo) or is_null($data[0]->codigo)){
        # Para este error Undefined offset: 0 en caso de modificar por un nombre nuevo y no uno que ya existe.             
            
            return true;
        }
        elseif($data[0]->codigo != $request->codigo ){
            $msg = "Nombre de Lección duplicada para Nivel Seleccionado. Introduzca un nombre válido";
            #dd ($data[0]->codigo);
            return false;
             }
        #------------------    
        }#aux 0

        
        if(empty($request->codigo) or is_null($request->codigo)){
            $msg = "Debe introducir el código de la Lección.";           
            return false;
        }
        else
        if(empty($request->nombre_leccion) or is_null($request->nombre_leccion)){
            $msg = "Debe introducir el nombre de la Lección.";            
            return false;
        }
        else
        if(empty($request->descri_leccion) or is_null($request->descri_leccion)){
            $msg = "Debe introducir la descripción de la Lección.";
            return false;
        }
        
        else
           return true;           
    }

	public function store1(Request $request){

		try{

			$leccion = new Lecciones();

			if($request->id_nivel==0)
			{
				$id_nivel=DB::table('Niveles')->where('id_nivel', '=', $request->lista_id_nivel)->first();
				$id_nivel=$id_nivel->id_nivel;
			}
			else{
				$id_nivel=$request->id_nivel;
			}
			$leccion->id_nivel 		= $id_nivel;
			$leccion->codigo 		= $request->codigo;
			$leccion->nombre 		= $request->nombre_leccion;
			$leccion->descripcion	= $request->descri_leccion;
			$leccion->activo 		= $request->activo_leccion;
			$leccion->save();

			return redirect()->route('leccion.index');
		}
		catch(Exception $e){

			return $e->getMessage();
		}

	}

	public function store(Request $request)
    {

    	$data = Niveles::all();


    	if($request->id_nivel==0)
			{
				$id_nivel=$request->lista_id_nivel;
			}
		else{
				$id_nivel=$request->id_nivel;
			}
	

    	$leccion=DB::table('Lecciones')->where('id_nivel','=',$id_nivel)->first();
		$nivel=DB::table('Niveles')->where('id_nivel', '=', $id_nivel)->first();
		$curso=DB::table('Cursos')->where('id_curso', '=', $nivel->id_curso)->first();
		$idioma=DB::table('Idiomas')->where('id_idioma', '=', $curso->id_idioma)->first();

		
        $error_msg = "";
        $lecciones  = [];
        $_data     = "";
        $_cod      = ""; 
        $_nomb     = ""; 
        $_descrip  = "";
        $_ruta     = "";
        $msg       = "";  
        $_class    = "";   

         
	
		
        try{
           
            
           if($this->validadata($request, $msg,1)){
                                        
            

                    DB::INSERT('INSERT INTO Lecciones (id_nivel,codigo, nombre, descripcion,activo, ruta)
                            VALUE(:id_nivel,:cod, :nomb, :descrip, :activo, :ruta)',
                               [ 
                               'id_nivel'=>$id_nivel,
                                 'cod'   =>$request->codigo,
                              
                                'nomb'   =>$request->nombre_leccion,
                                'descrip'=>$request->descri_leccion,
                                
                                'activo' =>$request->activo_leccion,                        
                                'ruta'   =>$request->ruta
                            ]
                    );
                     $_class = "alert alert-success";
                     $error_msg = "Almacenado correctamente.";   

                    //return redirect()->route($this->path.'.index');
                    //return view($this->path . '.index');
                    
                        return view($this->path.'.create', compact('data','id_nivel','error_msg', '_cod', '_nomb', '_descrip', '_ruta','_class','curso','idioma','nivel','leccion'));
                    }
            else{
                $error_msg = $msg;
                $_cod      = $request->codigo; 
                $_nomb     = $request->nombre_leccion;
                $_descrip  = $request->descri_leccion;
             
                $_ruta     = $request->ruta;
                $_class    = "alert alert-warning";
                
                return view($this->path.'.create', compact('data','id_nivel','error_msg', '_cod', '_nomb', '_descrip', '_ruta','_class','curso','idioma','nivel','leccion'));
             
           }
       	}
		catch(Exception $e){

            $error_msg =  $e->getMessage();          
        }
        catch(\Illuminate\database\QueryException $e){
            $error_msg = $e->getMessage();            
        }
              
        $_class = "alert alert-danger";
        
        return view($this->path.'.create', compact('data','id_nivel','error_msg', '_cod', '_nomb', '_descrip', '_ruta','_class','curso','idioma','nivel','leccion'));        
    }


	public function edit($id){

		$error_msg = "";
       
        $_class    = "";

      
       
		$leccion = lecciones::findOrFail($id);
		$nivel=DB::table('Niveles')->where('id_nivel', '=', $leccion->id_nivel)->first();
		$curso=DB::table('Cursos')->where('id_curso', '=', $nivel->id_curso)->first();
		$idioma=DB::table('Idiomas')->where('id_idioma', '=',$curso->id_idioma)->first();
		$data = DB::select('SELECT id_nivel, id_curso, codigo, nombre, descripcion, activo
							FROM Niveles
							WHERE (id_curso= ?)', [ $nivel->id_curso]);

		return view($this->path.'.edit', compact('nivel','id','data','curso','idioma','leccion','error_msg', '_class'));

	}

	public function update(Request $request, $id){

		$error_msg = "";
        $_cod      = "";
        $_class    = "";
        $_nomb     = $request->nombre_leccion; 
        $_descrip  = $request->descri_leccion;

        $id_nivel = $request->id_nivel;

        $id = $request->id_leccion;

        $leccion = Lecciones::findOrFail($id);
      	
		$nivel=DB::table('Niveles')->where('id_nivel', '=', $id_nivel)->first();
		$curso=DB::table('Cursos')->where('id_curso', '=', $nivel->id_curso)->first();
		$idioma=DB::table('Idiomas')->where('id_idioma', '=', $curso->id_idioma)->first();
       $data = DB::select('SELECT id_nivel, id_curso, codigo, nombre, descripcion, activo
							FROM Niveles
							WHERE (id_curso= ?)', [ $nivel->id_curso]);

        if($this->validadata($request, $msg,0)){
            try{



               /* if($file){
                    //obtenemos el nombre del archivo
                    $nombre = $file->getClientOriginalName();
                    if (Storage::exists($nombre))
                    {
                        Storage::delete($nombre);
                    }
                    //indicamos que queremos guardar un nuevo archivo en el disco local
                    Storage::disk('local')->put($nombre,  \File::get($file));
                }
                else{ */

                $leccion->id_nivel    = $request->lista_id_nivel;
                $leccion->codigo      = $request->codigo;
                $leccion->nombre      = $request->nombre_leccion;
                $leccion->descripcion = $request->descri_leccion;
                $leccion->activo      = $request->activo_leccion;
                $leccion->save();
                $_class = "alert alert-success";
                $error_msg = "Actualizado correctamente!"; 

               


                return view($this->path.'.edit', compact('nivel','id','data','curso','idioma','leccion','error_msg', '_class'));



            }
            catch(Exception $e){

                return $e->getMessage();
            }

        }
        else{
            $error_msg = $msg;
            $_cod      = $request->codigo;
            $_nomb     = $request->nombre_leccion;
            $_descrip  = $request->descri_leccion;
          
            $_ruta     = "";#$request->ruta;
            $_class    = "alert alert-warning";

            return view($this->path.'.edit', compact('leccion','nivel','id','curso','idioma','error_msg', '_class', '_cod', '_nomb', '_descrip', '_ruta','data'));



       }

	}

	public function buscaleccion()
    {
        //
        try{

			$codigo    =  Input::get('b_leccion');
			$id_nivel  =  Input::get('id_nivel');
            $data = DB::table('Niveles AS N')
						->join('Lecciones AS L', 'N.id_nivel', '=', 'L.id_nivel')
						->select('L.id_leccion AS id_leccion','N.id_nivel AS id_nivel','N.nombre AS nombre_N'	, 'L.codigo AS codigo_L'
						,'L.nombre AS nombre_L','L.descripcion AS descripcion_L'
						,'L.activo AS activo_L')
						->where('L.nombre', '=', $codigo )
						->get();
			if($id_nivel){
				$nivel=DB::table('Nivel')->where('id_nivel', '=', $id_nivel)->first();
				$curso=DB::table('Cursos')->where('id_curso', '=', $nivel->id_curso)->first();
				$idioma=DB::table('Idiomas')->where('id_idioma', '=',$curso->id_idioma)->first();
			}
            //return $data;
            if(!is_null($data)){
                return view($this->path .'.index' , compact('data','id_nivel','nivel','curso','idioma' ));
            }
            else{
            //return response('Data no encontrada, 404');
                echo ('Nombre de Lección no encontrada');
                return view($this->path .'.show', compact('data','id_nivel'));
            }
        }
        catch (exception$e){
            return $e->getMessage();
        }
	}


	public function eliminar(Request $request)
    {

		$id =Input::get('identidad');

		return $this->destroy($id);


	}


	public function destroy($id){

		try{
			$leccion = lecciones::findOrFail($id);
			$leccion->delete();
			return response()->json(array('msg'=> $id,'datos'=> $id), 200);
		}
		catch(Exception $e){

			return $e->getMessage();

		}

	}
}
