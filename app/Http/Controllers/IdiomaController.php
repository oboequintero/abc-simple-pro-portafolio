<?php

namespace App\Http\Controllers;

use App\Idiomas;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

use Storage;
use App\Http\Requests;
use Exception;


use Response;



class IdiomaController extends Controller
{

private $path ='vendor.adminlte.idioma';




    public function index(){

        $id=Input::get('id_idioma');

        if($id){
            $data = DB::select('SELECT  id_idioma, nombre, descripcion, activo
                                FROM Idiomas
                                WHERE (id_idioma = ?)', [$id]);
            $idioma=DB::table('Idiomas')->where('id_idioma', '=', $id)->first();
        }
        else{
            $data = Idiomas::all();
        }

        return view($this->path.'.index', compact('data','idioma'));
    }


    public function show($id){


        if($id==0){
            $data = Idiomas::all();
        }
        else{

            $data = DB::select('SELECT  id_idioma, nombre, descripcion, activo
                                FROM Idiomas
                                WHERE (id_idioma = ?)', [$id]);
            $idioma=DB::table('Idiomas')->where('id_idioma', '=', $id)->first();


        }
        return view($this->path.'.show', compact('data','idioma'));

   }

   public function create()
    {
        //  
        $error_msg = "";        
        
        $_nomb     = ""; 
        $_descrip  = "";
        $_ruta     = "";
        
        $_class    = "";
                        
        return view($this->path.'.create', compact('error_msg', '_nomb', '_descrip', '_ruta', '_class'));
    }

    /**
     * Función que valida que los datos del paquete a crear no sean nulos o vacío
     */
    function validadata($request, &$msg, $aux){
      
       
        $id=$request->id_idioma;

        $nomb=$request->nombre_idioma;

        $nombre=DB::table('Idiomas')->where('nombre', '=', $request->nombre_idioma)->first();

        if($nombre){
            if($aux==0){#Si el aux es 1 viene del update
                if($nombre->id_idioma == $request->id_idioma){  
                    return true;
                }
                else{ $msg = "Nombre de Idioma duplicado. Introduzca un nombre válido.";}

            }else{
                $msg = "Nombre de Idioma duplicado. Introduzca un nombre válido."; #store
                return false;
            }


        }
        else
        if(empty($request->nombre_idioma) or is_null($request->nombre_idioma)){
            $msg = "Debe introducir el nombre del Idioma.";
            return false;
        }
        
        else
        if(empty($request->descrip_idioma) or is_null($request->descrip_idioma)){
            $msg = "Debe introducir la descripción del Idioma.";
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
    public function store(Request $request)
    {
        //
        $error_msg = "";
        $paquetes  = [];
        $_data     = "";
        
        $_nomb     = ""; 
        $_descrip  = "";
        $_ruta     = "";
        
        $msg       = "";  
        $_class    = "";   

                
        
        
        try{

            /*$data = new PaqueteModel();
            
            
            $data->codigo       = $request->codigo_paquete;
            $data->nombre       = $request->nombre_paquete;
            $data->descripcion  = $request->descrip_paquete;
            $data->activo       = $request->activo_paquete;
            
            $data->save();
            */
           
            
           if($this->validadata($request, $msg, 1)){
                                        
                   /* DB::INSERT('INSERT INTO Paquetes(codigo, nombre, descripcion, activo, posicion)
                            VALUE(:cod, :nomb, :descrip, :activo, (SELECT MAX(posicion) + 1 FROM Paquetes AS Paq))',
                            [   'cod'    =>$request->codigo_paquete,
                                'nomb'   =>$request->nombre_paquete,
                                'descrip'=>$request->descrip_paquete,
                                'activo' =>$request->activo_paquete                        
                            ]
                    );*/


                    DB::INSERT('INSERT INTO Idiomas(nombre, descripcion, activo, ruta)
                            VALUE(:nomb, :descrip, :activo, :ruta)',
                            [   
                                'nomb'   =>$request->nombre_idioma,
                                'descrip'=>$request->descrip_idioma,
                               
                                'activo' =>$request->activo_idioma,                        
                                'ruta'   =>$request->ruta
                            ]
                    );

                     $_class = "alert alert-success";
                     $error_msg = "Almacenado correctamente.";   


                    //return redirect()->route($this->path.'.index');
                    //return view($this->path . '.index');
                                            return view($this->path.'.create', compact('error_msg', '_nomb', '_descrip', '_ruta','_class'));
                       }
            else{
                $error_msg = $msg;
                
                $_nomb     = $request->nombre_idioma;
                $_descrip  = $request->descrip_idioma;
               
                $_ruta     = $request->ruta;
                $_class    = "alert alert-warning";
                
                return view($this->path.'.create', compact('error_msg','_nomb', '_descrip', '_ruta', '_class'));
             
           }
        }
        catch(Exception $e){

            $error_msg =  $e->getMessage();          
        }
        catch(\Illuminate\database\QueryException $e){
            $error_msg = $e->getMessage();            
        }
              
        $_class = "alert alert-danger";
        
        return view($this->path.'.create', compact('error_msg','_nomb', '_descrip', '_ruta', '_class'));        
    }

    public function update(Request $request,$id)
    {
    
        $error_msg = "";
        $_data     = "";
        $_nomb     = $request->nombre_idioma; 
        $_descrip  = $request->descrip_idioma;
        $_ruta     = $request->ruta;
        
        $msg       = "";  
        $_class    = "";           
        $idioma = Idiomas::findOrFail($id);
        
        try{
       
            
           if($this->validadata($request, $msg,0)){
                                        
                 

                
                $nombre=$idioma->ruta;
                $idioma->id_idioma   = $id;
                
                $idioma->nombre      = $request->nombre_idioma;
                $idioma->descripcion = $request->descrip_idioma;
                $idioma->ruta        = $nombre;
            
                $idioma->activo      = $request->activo_idioma;

                $idioma->save();

                $_class = "alert alert-success";
                $error_msg = "Actualizado correctamente.";   


                   
                                            return view($this->path.'.edit', compact('id','error_msg', '_cod', '_nomb', '_descrip', '_ruta', '_class', 'idioma'));

                                           
                       }
            else{
                $error_msg = $msg;
                
                $_nomb     = $request->nombre_idioma;
                $_descrip  = $request->descri_idioma;
                $_ruta     = $request->ruta;
                $_class    = "alert alert-warning";
                
                return view($this->path.'.edit', compact('id','error_msg', '_cod', '_nomb', '_descrip', '_ruta', '_class', 'idioma'));
             
           }
        }
        catch(Exception $e){

            $error_msg =  $e->getMessage();          
        }
        catch(\Illuminate\database\QueryException $e){
            $error_msg = $e->getMessage();            
        }
              
        $_class = "alert alert-danger";
        
        return view($this->path.'.create', compact('error_msg','_nomb', '_descrip', '_ruta', '_class'));        
    }

   
    
     public function edit($id){

        $error_msg = "";
        $_cod      = "";
        $_nomb     = "";
        $_descrip  = "";
        $_ruta     = "";
        $_class    = "";
  
        $idioma = Idiomas::findOrFail($id);
      
        return view($this->path.'.edit', compact('idioma','id','error_msg', '_cod', '_nomb', '_descrip', '_ruta', '_class'));


    }
    

    public function update1(Request $request,$id){

        $data = Idiomas::findOrFail($id);

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
        else{

            $nombre=$data->ruta;

        }

        $data->nombre       = $request->nombre_idioma;
        $data->descripcion  = $request->descrip_idioma;
        $data->ruta         = $nombre;
        $data->activo       = $request->activo_idioma;
        $data->save();
        $id = 0;
        //return redirect()->route($this->path.'.show',0);

        return $this->index();

    }

    public function buscaidioma()
    {
        //
        try{

            $nombre    =  Input::get('b_idioma');
            $data = DB::select('SELECT  id_idioma, nombre, descripcion, activo
                                FROM Idiomas
                                WHERE (nombre = ?)', [$nombre]);

            //return $data;
            if(!is_null($data)){
                return view($this->path .'.index' , compact('data', 'nombre'));
            }
            else{
            //return response('Data no encontrada, 404');
                echo ('Nombre de Idioma no encontrado');
                return view($this->path .'.index', compact('data', 'nombre'));
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

            $data = Idiomas::findOrFail($id);
            $data->delete();
            return response()->json(array('msg'=> $id,'datos'=> $id), 200);

        }
        catch(Exception $e){

            return $e->getMessage();

        }

    }
}
