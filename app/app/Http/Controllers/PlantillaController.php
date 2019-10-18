<?php

namespace App\Http\Controllers;

use App\Lecciones;
use App\Plantillas;
use App\TipoPlantilla;

use Illuminate\Http\Request;

use App\Http\Requests;


use View;
use Redirect;

use DB;
use Illuminate\Support\Facades\Input;
use Exception;
class PlantillaController extends Controller
{
    private $path ='vendor.adminlte.plantilla';

    public function index(){

		$id_leccion=Input::get('id_leccion');

		if($id_leccion){
			
			$data = DB::select('SELECT 	P.id_plantilla AS id_plantilla
										,P.codigo AS codigo_P
										,P.nombre AS nombre_P,P.descripcion AS descripcion_P
										,T.nombre AS tipo_P,P.activo AS activo_P,P.pagina AS pagina_P
										,CASE WHEN  valor(P.id_plantilla)  IS NULL THEN 0 ELSE 1 END as valor
								FROM  Plantillas AS P
								LEFT JOIN Tipo_Plantilla AS T ON T.id_tipo =P.tipo_plantilla
								WHERE (P.id_leccion = :_id)
								ORDER BY P.pagina' , ['_id'=>$id_leccion] );
						
			$plantilla=DB::table('Plantillas')->where('id_leccion', '=', $id_leccion)->first();
			$leccion=DB::table('Lecciones')->where('id_leccion', '=', $id_leccion)->first();
			$nivel=DB::table('Niveles')->where('id_nivel', '=', $leccion->id_nivel)->first();
			$curso=DB::table('Cursos')->where('id_curso','=',$nivel->id_curso)->first();
			$idioma=DB::table('Idiomas')->where('id_idioma', '=', $curso->id_idioma)->first();

						
			
		}
		else{

			$data = DB::select('SELECT  P.id_plantilla AS id_plantilla
										, P.codigo AS codigo_P
										,P.nombre AS nombre_P,P.descripcion AS descripcion_P
										,T.nombre AS tipo_P,P.activo AS activo_P,P.pagina AS pagina_P
										,CASE WHEN  valor(P.id_plantilla)  IS NULL THEN 0 ELSE 1 END as valor
								FROM  Plantillas AS P
								LEFT JOIN Tipo_Plantilla AS T ON T.id_tipo =P.tipo_plantilla
								ORDER BY P.pagina');

			
		}
		return view($this->path.'.index', compact('data','id_leccion','leccion','nivel','idioma','curso','plantilla'));

    }
	
	public function show($id_leccion){

	}
    	
	
    public function create(){

    	$id_leccion=Input::get('id_leccion');
    	$id = Input::get('id_leccion');

		if($id_leccion) {
					
			$plantilla=DB::table('Plantillas')->where('id_leccion', '=', $id_leccion)->first();
			$leccion=DB::table('Lecciones')->where('id_leccion', '=', $id_leccion)->first();
			$nivel=DB::table('Niveles')->where('id_nivel', '=', $leccion->id_nivel)->first();
			$curso=DB::table('Cursos')->where('id_curso','=',$nivel->id_curso)->first();
			$idioma=DB::table('Idiomas')->where('id_idioma', '=', $curso->id_idioma)->first();
		}
        elseif($id==0){
			$leccion = DB::table('Lecciones')->get();
		}

		$tipo_p = DB::table('Tipo_Plantilla')->get();

		$error_msg = "";        
        $_cod      = ""; 
        $_nomb     = ""; 
        $_descrip  = "";
        $_pagina     = "";
        
        $_class    = "";


		return view($this->path.'.create', compact('leccion','id','tipo_p','error_msg','_cod', '_nomb', '_descrip', '_pagina', '_class', 'plantilla', 'nivel', 'curso', 'idioma'));
    }


	public function store1(Request $request){
		
		try{

			$plantilla = new Plantillas();
			if($request->id_leccion==0)
			{
				$id_leccion=DB::table('Lecciones')->where('codigo', '=', $request->lista_id_leccion)->first();
				$id_leccion=$id_leccion->id_leccion;
			}
			else{
				$id_leccion=$request->id_leccion;
			}
			
			$plantilla->id_leccion		= $id_leccion;
			$plantilla->codigo 			= $request->codigo;
			$plantilla->pagina			= $request->pag_plantilla;
			$plantilla->nombre 			= $request->nombre_plantilla;
			$plantilla->descripcion		= $request->descri_plantilla;
			$plantilla->activo 			= $request->activo_plantilla;
			$plantilla->tipo_plantilla	= $request->tipo_plantilla;
			$plantilla->save();

			return redirect()->route('plantilla.index',$request->id_leccion);
		}
		catch(Exception $e){

			return $e->getMessage();
		}

	}
	
	public function edit($id){
		

		$error_msg = "";
       
        $_class    = "";

		$plantilla = Plantillas::findOrFail($id);

		$tipo_p = DB::table('Tipo_Plantilla')->get();

		$leccion = Lecciones::findOrFail($plantilla->id_leccion);

		$id_leccion = $plantilla->id_leccion;
		
		$data = Lecciones::all();

		$leccion1=DB::table('Lecciones')->where('id_leccion', '=', $id_leccion)->first();
		$nivel=DB::table('Niveles')->where('id_nivel', '=', $leccion->id_nivel)->first();
		$curso=DB::table('Cursos')->where('id_curso','=',$nivel->id_curso)->first();
		$idioma=DB::table('Idiomas')->where('id_idioma', '=', $curso->id_idioma)->first();


		return view($this->path.'.edit', compact('plantilla','tipo_p','error_msg', '_class', 'leccion', 'data','id_leccion','leccion1','nivel','curso','idioma','id'));
	}


	public function store(Request $request)
    {

    	$data = Lecciones::all();
    	$tipo_p = TipoPlantilla::all();


	

    	if($request->id_leccion==0)
			{
				$id_leccion=$request->lista_id_leccion;
				$id=$id_leccion;
			}
		else{
				$id_leccion=$request->id_leccion;
				$id=$id_leccion;
			}
		
		
        $error_msg = "";
        $plantillas  = [];
        $_data     = "";
        $_cod      = ""; 
        $_nomb     = ""; 
        $_descrip  = "";
        $_pagina     = "";
        $msg       = "";  
        $_class    = "";   

         
	
		
        try{
           
            
           if($this->validadata($request, $msg, 1)){
                                        
            

                    DB::INSERT('INSERT INTO Plantillas (id_leccion,codigo, nombre, descripcion,activo, pagina,tipo_plantilla)
                            VALUE(:id_leccion,:cod, :nomb, :descrip, :activo, :pagina,:tipo_plantilla)',
                               [ 
                               'id_leccion'=>$id_leccion,
                                 'cod'   =>$request->codigo,
                              
                                'nomb'   =>$request->nombre_plantilla,
                                'descrip'=>$request->descri_plantilla,
                                  'activo' =>$request->activo_plantilla,
                                
                                'pagina' =>$request->pag_plantilla,                        
                                'tipo_plantilla'   =>$request->tipo_plantilla
                            ]
                    );
                     $_class = "alert alert-success";
                     $error_msg = "Almacenado correctamente.";   

                    //return redirect()->route($this->path.'.index');
                    //return view($this->path . '.index');
                    
                        return view($this->path.'.create', compact('data','id_leccion','error_msg', '_cod', '_nomb', '_descrip', '_pagina','_class','id','tipo_p'));
                    }
            else{
                $error_msg = $msg;
                $_cod      = $request->codigo; 
                $_nomb     = $request->nombre_plantilla;
                $_descrip  = $request->descri_plantilla;
             
                $_pagina     = $request->ruta;
                $_class    = "alert alert-warning";
                
                return view($this->path.'.create', compact('data','id_leccion','error_msg', '_cod', '_nomb', '_descrip', '_pagina','_class','id','tipo_p'));
             
           }
       	}
		catch(Exception $e){

            $error_msg =  $e->getMessage();          
        }
        catch(\Illuminate\database\QueryException $e){
            $error_msg = $e->getMessage();            
        }
              
        $_class = "alert alert-danger";
        
        return view($this->path.'.create', compact('data','id_leccion','error_msg', '_cod', '_nomb', '_descrip', '_pagina','_class','id','tipo_p'));        
    }



	function validadata($request, &$msg, $aux){

	    $id=$request->lista_id_leccion;
            
        $nomb=$request->nombre_plantilla;
        $codigo=$request->codigo;
        $tipo_plantilla=$request->tipo_plantilla;
        $pagina_plantilla=$request->pag_plantilla;

        $codigo=DB::table('Plantillas')->where('codigo', '=', $request->codigo)->first();

        if($request->id_leccion==0)
            {
                $id=$request->lista_id_leccion;
                
            }
        else{
                $id=$request->id_leccion;
                 
            }

       if ($aux==1) {     
         #No debe repetirse la combinacion de leccion y nombre

         $nombre = DB::select('SELECT *
                                    FROM Plantillas AS p
                                    WHERE (p.id_leccion = :_id) AND (p.nombre = :_nomb)',
                                    ['_id'=>$id, '_nomb'=>$nomb]);

         #No debe repetirse la combinacion de leccion-pagina-tipo_plantilla

         $leccion_pagina_tipopl = DB::select('SELECT *
                                    FROM Plantillas AS p
                                    WHERE (p.id_leccion = :_id) AND (p.pagina = :_pagina_plantilla) AND (p.tipo_plantilla = :_tipo_plantilla)',
                                    ['_id'=>$id, '_pagina_plantilla'=>$pagina_plantilla, '_tipo_plantilla'=>$tipo_plantilla]);

         $pagina = DB::select('SELECT *
                                    FROM Plantillas AS p
                                    WHERE (p.id_leccion = :_id) AND (p.pagina = :_pagina_plantilla)',
                                    ['_id'=>$id, '_pagina_plantilla'=>$pagina_plantilla]);
      
        
        if($codigo){
            $msg = "Código de Plantilla duplicado. Introduzca un código válido.";           
            return false;
        }
        else

        if($nombre){
            $msg = "Nombre de Plantilla duplicado para Lección Seleccionada. Introduzca un nombre válido.";           
            return false;
        }
        else

        if($pagina){
            $msg = "Data Inválida. No debe repetirse una página por Lección";           
            return false;
        }

        if($leccion_pagina_tipopl){
            $msg = "Data Inválida. No se debe repetir el tipo de plantilla por página para una Lección.";           
            return false;
        }
       }#aux 1

       elseif ($aux == 0)

        {

         $data = DB::select('SELECT *
                                    FROM Plantillas AS p
                                    WHERE (p.id_leccion = :_id) AND (p.nombre = :_nomb)',
                                    ['_id'=>$id, '_nomb'=>$nomb]);

         $data2 = DB::select('SELECT *
                                    FROM Plantillas AS p
                                    WHERE (p.id_leccion = :_id) AND (p.pagina = :_pagina_plantilla) AND (p.tipo_plantilla = :_tipo_plantilla)',
                                    ['_id'=>$id, '_pagina_plantilla'=>$pagina_plantilla, '_tipo_plantilla'=>$tipo_plantilla]);
         $data3 = DB::select('SELECT *
                                    FROM Plantillas AS p
                                    WHERE (p.id_leccion = :_id) AND (p.pagina = :_pagina_plantilla)',
                                    ['_id'=>$id, '_pagina_plantilla'=>$pagina_plantilla]);
        # Mnsaje deberia ser ya existe este tipo de plantilla para esta id leccion y tipo de plantilla y pagina

        #------------------
        if(empty($data[0]->codigo) or is_null($data[0]->codigo)){
        # Para este error Undefined offset: 0 en caso de modificar por un nombre nuevo y no uno que ya existe.             
            
            return true;
        }
        elseif(empty($data2[0]->codigo) or is_null($data2[0]->codigo)){
        # Para este error Undefined offset: 0 en caso de modificar por una pagina y tipo de plantilla nueva y no uno que ya existe.             
            
            return true;
        }
        elseif(empty($data3[0]->codigo) or is_null($data3[0]->codigo)){
        # Para este error Undefined offset: 0 en caso de modificar por una pagina y tipo de plantilla nueva y no uno que ya existe.             
            
            return true;
        }
        elseif($data[0]->codigo != $request->codigo ){
            $msg = "Nombre de Plantilla duplicado para Lección Seleccionada. Introduzca un nombre válido";
            #dd ($data[0]->codigo);
            return false;
             }
        elseif($data2[0]->codigo != $request->codigo ){
            $msg = "Ya existe este Tipo de Plantilla para Otra Lección, Tipo de plantilla y Página";
           
            return false;
             }

        elseif($data3[0]->codigo != $request->codigo ){
        	#dd ($data3[0]->codigo);
            $msg = "Data Inválida. No debe repetirse una página por Lección";
           
            return false;
             }
        #------------------    
        }#aux 0
        if(empty($request->codigo) or is_null($request->codigo)){
            $msg = "Debe introducir el código de la Plantilla.";           
            return false;
        }
        else
        if(empty($request->nombre_plantilla) or is_null($request->nombre_plantilla)){
            $msg = "Debe introducir el nombre de la Plantilla.";      
            return false;
        }
        else
        if(empty($request->descri_plantilla) or is_null($request->descri_plantilla)){
            $msg = "Debe introducir la descripción de la Plantilla.";
            return false;
        }
        else
        if(empty($request->pag_plantilla) or is_null($request->pag_plantilla)){
            $msg = "Debe introducir la página de la Plantilla.";
            return false;
        }
        
        else
           return true;           
    }


	public function update1(Request $request, $id){

		$plantilla = Plantillas::findOrFail($id);
		
		$plantilla->codigo 			= $request->codigo;
		$plantilla->pagina			= $request->pag_plantilla;
		$plantilla->nombre 			= $request->nombre_plantilla;
		$plantilla->descripcion		= $request->descri_plantilla;
		$plantilla->activo 			= $request->activo_plantilla;
		$plantilla->tipo_plantilla	= $request->tipo_plantilla;
		$plantilla->save();
		return redirect()->route('plantilla.index',$request->id_leccion);
	}

	public function update(Request $request, $id){
          
        $error_msg = ""; 
        $_cod      = "";
        $_class    = "";
        $_nomb     = $request->nombre_plantilla; 
        $_descrip  = $request->descri_plantilla;
        $_pagina  = $request->pag_plantilla;

        $id_leccion=$request->id_leccion;
    	$id = $request->id_plantilla;

		$plantilla = Plantillas::findOrFail($id);

		$tipo_p = DB::table('Tipo_Plantilla')->get();

		$leccion = Lecciones::findOrFail($plantilla->id_leccion);
		
		$data = Lecciones::all();


       

		$leccion1=DB::table('Lecciones')->where('id_leccion', '=', $id_leccion)->first();
		$nivel=DB::table('Niveles')->where('id_nivel', '=', $leccion->id_nivel)->first();
		$curso=DB::table('Cursos')->where('id_curso','=',$nivel->id_curso)->first();
		$idioma=DB::table('Idiomas')->where('id_idioma', '=', $curso->id_idioma)->first();





        
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

                $plantilla->codigo 			= $request->codigo;
				$plantilla->pagina			= $request->pag_plantilla;
				$plantilla->nombre 			= $request->nombre_plantilla;
				$plantilla->descripcion		= $request->descri_plantilla;
				$plantilla->activo 			= $request->activo_plantilla;
				$plantilla->tipo_plantilla	= $request->tipo_plantilla;
				$plantilla->save();
				
                $_class = "alert alert-success";
                $error_msg = "Actualizado correctamente."; 

              return view($this->path.'.edit', compact('error_msg','_class','plantilla','tipo_p','error_msg', '_class', 'leccion', 'data','id_leccion','leccion1','nivel','curso','idioma','id'));



            }
            catch(Exception $e){

                return $e->getMessage();
            }

        }
        else{
            $error_msg = $msg;
            $_cod      = $request->codigo;
            $_nomb     = $request->nombre_plantilla;
            $_descrip  = $request->descri_plantilla;
            $_pagina  = $request->pag_plantilla;
            $_ruta     = "";#$request->ruta;
            $_class    = "alert alert-warning";

            
              return view($this->path.'.edit', compact('plantilla','id_leccion','error_msg', '_cod', '_nomb', '_descrip', '_pagina','_class','id','tipo_p','data','leccion','id_leccion','leccion1','nivel','curso','idioma','id'));

       }

    }


	public function buscaplantilla()
    {
        //        
        try{

			$codigo     =  Input::get('b_plantilla');
			$id_leccion	=  Input::get('id_leccion');
			
			$data = DB::select('SELECT P.id_plantilla AS id_plantilla
								,P.codigo AS codigo_P
								,P.nombre AS nombre_P,P.descripcion AS descripcion_P
								,T.nombre AS tipo_P,P.activo AS activo_P,P.pagina AS pagina_P
								,CASE WHEN  valor(P.id_plantilla)  IS NULL THEN 0 ELSE 1 END as valor
								FROM Plantillas AS P
								INNER JOIN Tipo_Plantilla AS T ON  T.id_tipo = P.tipo_plantilla
								WHERE (P.codigo = :_cod) OR (P.nombre = :_nomb)
                                        OR (P.pagina = :_pag)',
										['_cod'=>$codigo, '_nomb'=>$codigo, '_pag'=>$codigo]);
			if($id_leccion){
				$plantilla=DB::table('Plantillas')->where('id_leccion', '=', $id_leccion)->first();
				$leccion=DB::table('Lecciones')->where('id_leccion', '=', $id_leccion)->first();
				$nivel=DB::table('Niveles')->where('id_nivel', '=', $leccion->id_nivel)->first();
				$curso=DB::table('Cursos')->where('id_curso','=',$nivel->id_curso)->first();
				$idioma=DB::table('Idiomas')->where('id_idioma', '=', $curso->id_idioma)->first();
			}

            if(!is_null($data)){                
                return view($this->path.'.index', compact('data','id_leccion','leccion','nivel','idioma','curso','plantilla'));
            }
            else{
            //return response('Data no encontrada, 404');
                return view($this->path.'.index', compact('data','id_leccion','leccion','nivel','idioma','curso','plantilla'));
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
			$Plantillas = Plantillas::findOrFail($id);
			$Plantillas->delete();
			return response()->json(array('msg'=> $id,'datos'=> $id), 200);
		}
		catch(Exception $e){

			return $e->getMessage();

		}

	}
}
