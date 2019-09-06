<?php

namespace App\Http\Controllers;

use App\Idiomas;
use App\Cursos;
use App\Niveles;


use Illuminate\Support\Facades\Input;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;


use Exception;


class NivelController extends Controller
{

	private $path ='vendor.adminlte.nivel';

    public function index(){

		$id_curso=Input::get('id_curso');

		if($id_curso ){

			$nivel=DB::table('Niveles')->where('id_curso','=',$id_curso)->first();
			$curso=DB::table('Cursos')->where('id_curso', '=', $id_curso)->first();
			$idioma=DB::table('Idiomas')->where('id_idioma', '=',$curso->id_idioma)->first();

			$data = DB::select('SELECT id_nivel, id_curso, codigo, nombre, descripcion, activo
								FROM Niveles
								WHERE (id_curso = ?)', [$id_curso]);
		}
		else{

			$data = Niveles::all();

		}

    	return view($this->path.'.index', compact('data','id_curso','curso','idioma'));

	}

    public function show($id_curso){

		if($id_curso==0 ){
			$data = Cursos::all();
		}
		else{
			$nivel=DB::table('Niveles')->where('id_curso','=',$id_curso)->first();
			$curso=DB::table('Cursos')->where('id_curso', '=', $id_curso)->first();
			$idioma=DB::table('Idiomas')->where('id_idioma', '=',$curso->id_idioma)->first();

			$data = DB::select('SELECT id_nivel, id_curso, codigo, nombre, descripcion, activo
								FROM Niveles
								WHERE (id_curso = ?)', [$id_curso]);
		}

    	return view($this->path.'.show', compact('data','id_curso','curso','idioma'));
    }



    public function create(){

		$id_curso = Input::get('id_curso');

        $error_msg = "";        
        $_cod      = ""; 
        $_nomb     = ""; 
        $_descrip  = "";
        $_ruta     = "";
        
        $_class    = "";
		if($id_curso==0 ){

            $data = Cursos::all();

		}
		else{
			$curso=DB::table('Cursos')->where('id_curso', '=', $id_curso)->first();
			$idioma=DB::table('Idiomas')->where('id_idioma', '=',$curso->id_idioma)->first();
			$nivel=DB::table('Niveles')->where('id_curso','=',$id_curso)->first();
			$data = DB::select('SELECT id_nivel, id_curso, codigo, nombre, descripcion, activo
								FROM Niveles
								WHERE (id_curso = ?)', [$id_curso]);
		}

		return view($this->path.'.create', compact('error_msg', '_cod', '_nomb', '_descrip', '_ruta', '_class','data','curso','idioma','id_curso'));

    }


	function validadata($request, &$msg, $aux){
     
		$file = $request->file('input-b1');

       
           
        $id=$request->lista_id_curso;
            
            
    

        $nomb=$request->nombre_nivel;
        #dd ($nomb);
        $codigo=$request->codigo;


        if ($aux==1) {
         $codigo=DB::table('Niveles')->where('codigo', '=', $request->codigo)->first();


      #No debe repetirse la combinacion de curso y nombre, pero si se puede repetir el mismo nombre para DIFERENTES CURSOS

        $nombre = DB::select('SELECT *
                                    FROM Niveles AS p
                                    WHERE (p.id_curso = :_id) AND (p.nombre = :_nomb)',
                                    ['_id'=>$id, '_nomb'=>$nomb]);
        

        if($codigo){
            $msg = "Código de Nivel duplicado. Introduzca un código válido.";           
            return false;
        }
       else

        if($nombre){
            $msg = "Nombre de Nivel duplicado para curso Selecionado. Introduzca un nombre válido.";           
            return false;
        }
        
      } # aux 1
      elseif ($aux == 0)
        {

         #dd ($nomb );
         #dd ($id);
         $data = DB::select('SELECT *
                                    FROM Niveles AS p
                                    WHERE (p.id_curso = :_id) AND (p.nombre = :_nomb)',
                                    ['_id'=>$id, '_nomb'=>$nomb]);

        #------------------
        if(empty($data[0]->codigo) or is_null($data[0]->codigo)){
        # Para este error Undefined offset: 0 en caso de modificar por un nombre nuevo y no uno que ya existe.             
            
            return true;
        }
        elseif($data[0]->codigo != $request->codigo ){
            $msg = "Nombre de Nivel duplicado para Curso Seleccionado. Introduzca un nombre válido";
            #dd ($data[0]->codigo);
            return false;
             }
        #------------------    
        }#aux 0

        if(empty($request->codigo) or is_null($request->codigo)){
            $msg = "Debe introducir el código del Nivel.";           
            return false;
        }
        else
        if(empty($request->nombre_nivel) or is_null($request->nombre_nivel)){
            $msg = "Debe introducir el nombre del Nivel.";            
            return false;
        }
        else
        if(empty($request->descri_nivel) or is_null($request->descri_nivel)){
            $msg = "Debe introducir la descripción del Nivel.";
            return false;
        }
        
        else
           return true;           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store1(Request $request){

		try{

			$nivel = new Niveles();
			if($request->id_curso==0)
			{
				$id_curso=$request->lista_id_curso;
			}
			else{
				$id_curso=$request->id_curso;
			}

			$nivel->id_curso   	= $id_curso;
			$nivel->codigo 		= $request->codigo;
			$nivel->nombre 		= $request->nombre_nivel;
			$nivel->descripcion	= $request->descri_nivel;
			$nivel->activo 		= $request->activo_nivel;
			$nivel->save();

			return redirect()->route('nivel.index');
		}
		catch(Exception $e){

			return $e->getMessage();
		}

	}

    public function store(Request $request)
    {

    	$data = Cursos::all();


    	if($request->id_curso==0)
			{
				$id_curso=$request->lista_id_curso;
			}
		else{
				$id_curso=$request->id_curso;
			}
	

    	$curso=DB::table('Cursos')->where('id_curso', '=', $id_curso)->first();
		$idioma=DB::table('Idiomas')->where('id_idioma', '=',$curso->id_idioma)->first();
		$nivel=DB::table('Niveles')->where('id_curso','=',$id_curso)->first();
		
		
        $error_msg = "";
        $niveles  = [];
        $_data     = "";
        $_cod      = ""; 
        $_nomb     = ""; 
        $_descrip  = "";
        $_ruta     = "";
        $msg       = "";  
        $_class    = "";   

         
	
		if($request->id_curso==0)
			{
				$id_curso=$request->lista_id_curso;
			}
		else{
				$id_curso=$request->id_curso;
			}       
        
        try{
           
            
           if($this->validadata($request, $msg,1)){
                                        
            

                    DB::INSERT('INSERT INTO Niveles(id_curso,codigo, nombre, descripcion,activo, ruta)
                            VALUE(:id_curso,:cod, :nomb, :descrip, :activo, :ruta)',
                               [ 
                               'id_curso'=>$id_curso,
                                 'cod'   =>$request->codigo,
                              
                                'nomb'   =>$request->nombre_nivel,
                                'descrip'=>$request->descri_nivel,
                                
                                'activo' =>$request->activo_nivel,                        
                                'ruta'   =>$request->ruta
                            ]
                    );
                     $_class = "alert alert-success";
                     $error_msg = "Almacenado correctamente.";   

                    //return redirect()->route($this->path.'.index');
                    //return view($this->path . '.index');
                    
                        return view($this->path.'.create', compact('data','id_curso','error_msg', '_cod', '_nomb', '_descrip', '_ruta','_class','curso','idioma','nivel'));
                              }
            else{
                $error_msg = $msg;
                $_cod      = $request->codigo; 
                $_nomb     = $request->nombre_nivel;
                $_descrip  = $request->descri_nivel;
             
                $_ruta     = $request->ruta;
                $_class    = "alert alert-warning";
                
                return view($this->path.'.create', compact('data','id_curso','error_msg', '_cod', '_nomb', '_descrip', '_ruta','_class','curso','idioma','nivel'));
             
           }
       	}
		catch(Exception $e){

            $error_msg =  $e->getMessage();          
        }
        catch(\Illuminate\database\QueryException $e){
            $error_msg = $e->getMessage();            
        }
              
        $_class = "alert alert-danger";
        
        return view($this->path.'.create', compact('data','id_curso','error_msg', '_cod', '_nomb', '_descrip', '_ruta','_class','curso','idioma','nivel'));        
    }


	public function edit($id){
 # $id se refiere al id_nivel que viene del index
        $error_msg = "";
       
        $_class    = "";
       

		$nivel = Niveles::findOrFail($id);
		$curso=DB::table('Cursos')->where('id_curso', '=', $nivel->id_curso)->first();
		$idioma=DB::table('Idiomas')->where('id_idioma', '=',$curso->id_idioma)->first();
		$data = DB::select('SELECT id_curso, id_idioma, codigo, nombre, descripcion, activo
							FROM Cursos
							WHERE (id_idioma = ?)', [$curso->id_idioma]);
		return view($this->path.'.edit', compact('nivel','id','data','curso','idioma','error_msg', '_class'));

	}

	public function update1(Request $request, $id){
#-------------------------------------------------------
		$nivel = Niveles::findOrFail($id);

		$nivel->id_curso 	= $request->lista_id_curso;
		$nivel->codigo 		= $request->codigo;
		$nivel->nombre 		= $request->nombre_nivel;
		$nivel->descripcion	= $request->descri_nivel;
		$nivel->activo 		= $request->activo_nivel;
		$nivel->save();
		return redirect()->route('nivel.index');

#---------------------------------------------------------        
	}
     public function update(Request $request, $id){
          
        $error_msg = "";
        $_cod      = "";
        $_class    = "";
        $_nomb     = $request->nombre_nivel; 
        $_descrip  = $request->descri_nivel;
       

        $nivel = Niveles::findOrFail($id);
        $curso=DB::table('Cursos')->where('id_curso', '=', $nivel->id_curso)->first();
        $idioma=DB::table('Idiomas')->where('id_idioma', '=',$curso->id_idioma)->first();
        $data = DB::select('SELECT id_curso, id_idioma, codigo, nombre, descripcion, activo
                            FROM Cursos
                            WHERE (id_idioma = ?)', [$curso->id_idioma]);

       

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

                $nivel->id_curso    = $request->lista_id_curso;
                $nivel->codigo      = $request->codigo;
                $nivel->nombre      = $request->nombre_nivel;
                $nivel->descripcion = $request->descri_nivel;
                $nivel->activo      = $request->activo_nivel;
                $nivel->save();
                $_class = "alert alert-success";
                $error_msg = "Actualizado correctamente."; 

                return view($this->path.'.edit', compact( 'nivel','id','data','curso','idioma','error_msg', '_class'));



            }
            catch(Exception $e){

                return $e->getMessage();
            }

        }
        else{
            $error_msg = $msg;
            $_cod      = $request->codigo;
            $_nomb     = $request->nombre_nivel;
            $_descrip  = $request->descri_nivel;
          
            $_ruta     = "";#$request->ruta;
            $_class    = "alert alert-warning";

            return view($this->path.'.edit', compact('nivel','id','data','curso','idioma','error_msg', '_class', '_cod', '_nomb', '_descrip', '_ruta'));

       }

    }

	public function buscanivel()
    {
        //
        try{

			$codigo   	=  Input::get('b_nivel');
			$id_curso    		=  Input::get('id_curso');

			$data = DB::select('SELECT id_nivel, id_curso, codigo, nombre, descripcion, activo
								FROM Niveles
								WHERE (codigo = ?)', [$codigo]);

           	if($id_curso){
				$curso=DB::table('Cursos')->where('id_curso', '=', $id_curso)->first();
				$idioma=DB::table('Idiomas')->where('id_idioma', '=',$curso->id_idioma)->first();
			}
			//return $data;
            if(!is_null($data)){
                return view($this->path .'.show' , compact('data','id_curso','idioma','curso'));
            }
            else{
                //return response('Data no encontrada, 404');
                echo ('Codigo de Nivel no encontrado');
                return view($this->path .'.show', compact('data','id_curso','idioma','curso'));
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
			$nivel = Niveles::findOrFail($id);
			$nivel->delete();
			return response()->json(array('msg'=> $id,'datos'=> $id), 200);
		}
		catch(Exception $e){
			return $e->getMessage();
		}

	}





}







