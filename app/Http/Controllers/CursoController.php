<?php

namespace App\Http\Controllers;

use App\Niveles;
use App\Idiomas;
use App\Cursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Storage;


use Exception;


class CursoController extends Controller
{

    private $path ='vendor.adminlte.curso';

    public function index(){

        $id_idioma=Input::get('id_idioma');




        if($id_idioma){

            $idioma=DB::table('Idiomas')->where('id_idioma', '=',$id_idioma)->first();
            $curso=DB::table('Cursos')->where('id_idioma', '=',$id_idioma)->first();
            $data = DB::select('SELECT id_curso, id_idioma, codigo, nombre, descripcion, precio,activo
                                FROM Cursos
                                WHERE (id_idioma = ?)', [$idioma->id_idioma]);

        }
        else{
            $data = Cursos::all();
        }
        return view($this->path.'.index', compact('data','id_idioma','idioma','curso'));
    }

    public function show($id_idioma){

        if($id_idioma==0){
            $data = Cursos::all();
        }
        else{
            $idioma=DB::table('Idiomas')->where('id_idioma', '=',$id_idioma)->first();
            $curso=DB::table('Cursos')->where('id_idioma', '=',$id_idioma)->first();
            $data = DB::select('SELECT id_curso, id_idioma, codigo, nombre, descripcion, precio,activo
                                FROM Cursos
                                WHERE (id_idioma = ?)', [$idioma->id_idioma]);
        }

        return view($this->path.'.show', compact('data','id_idioma','idioma','curso'));
    }



    public function create(){
        $error_msg = "";
        $_cod      = "";
        $_nomb     = "";
        $_descrip  = "";
        $_ruta     = "";
        $_precio   = "";
        $_class    = "";

        $nombre_idioma='';
        $id = Input::get('id_idioma');
        if($id==0){
            $idioma = Idiomas::all();
        }
        else{
            $Idioma=DB::table('Idiomas')->where('id_idioma', '=', $id)->first();
            $nombre_idioma=$Idioma->nombre;
        }


        return view($this->path.'.create',compact('idioma','id','nombre_idioma', '_class'));
    }


    function validadata($request, &$msg,$aux){


        $file = $request->file('input-b1');

        if($request->id_idioma==0)
        {

            $id_idioma=DB::table('Idiomas')->where('nombre', '=', $request->lista_id_idioma)->first();
            $id_idioma=$id_idioma->id_idioma;
            $id=$id_idioma;
            $nombre_idioma=$request->lista_id_idioma;
        }
        else{
            $id_idioma=$request->id_idioma;
            $id=$request->id_idioma;
            $nombre_idioma=$request->lista_id_idioma;
        }

        $nomb=$request->nombre_curso;
        $codigo=$request->codigo;
        #dd($id);

        if($aux == 1) #venimos del store

        {
           $nombre = DB::select('SELECT *
                                    FROM Cursos AS c
                                    WHERE (c.id_idioma = :_id) AND (c.nombre = :_nomb)',
                                    ['_id'=>$id, '_nomb'=>$nomb]);
           if($nombre){
            $msg = "Nombre de Curso duplicado para Idioma Seleccionado. Introduzca un nombre válido.";
            return false;
             }
        }

        else #venimos del update
        if($aux == 0)
        {
            $data = DB::select('SELECT codigo
                                    FROM Cursos AS c
                                    WHERE (c.id_idioma = :_id) AND (c.nombre = :_nomb)',
                                    ['_id'=>$id, '_nomb'=>$nomb]);
               #------------------
               if(empty($data[0]->codigo) or is_null($data[0]->codigo)){
                # Para este error Undefined offset: 0 en caso de modificar por un nombre nuevo y no uno que ya existe.
                   return true;
                }
                elseif($data[0]->codigo != $request->codigo ){
                    $msg = "Nombre del Curso duplicado. Introduzca un nombre válido";
                    #dd ($data[0]->codigo);
                    return false;
                     }
                #------------------

        }



/*
        $nombre=DB::table('Cursos')->where('nombre', '=', $request->nombre_curso)->first();

        if($nombre){
            if($aux==0){#Si el aux es 1 viene del update
                if($nombre->id_idioma == $request->lista_id_idioma){
                    if ($nombre->codigo == $request->codigo){
                    return true;}
                }
                else{ $msg = "Nombre de Curso duplicado para este Idioma. Introduzca un nombre válido. u2";}

            }else{
                $msg = "Nombre de Curso duplicado para este Idioma. Introduzca un nombre válido. store"; #store
                return false;
            }


        }
        */
        if(empty($request->precio_curso) or is_null($request->precio_curso)){
            $request->precio_curso = "00";
        }

        if(empty($request->codigo) or is_null($request->codigo)){
            $msg = "Debe introducir el código del curso.";
            return false;
        }
        else
        if(empty($request->nombre_curso) or is_null($request->nombre_curso)){
            $msg = "Debe introducir el nombre del curso.";
            return false;
        }
        else
        if(empty($request->descri_curso) or is_null($request->descri_curso)){
            $msg = "Debe introducir la descripción del curso.";
            return false;
        }
        else
        if($request->precio_curso < 0){
            $msg = "El precio no puede ser menor a cero.";
            return false;
        }
        else
           return true;


}


    public function store(Request $request){


        $nombre='';
        $file = $request->file('input-b1');
        $idioma = Idiomas::all();
        $curso = new Cursos();
        if($request->id_idioma==0)
        {

            $id_idioma=DB::table('Idiomas')->where('nombre', '=', $request->lista_id_idioma)->first();
            $id_idioma=$id_idioma->id_idioma;
            $id=$id_idioma;
            $nombre_idioma=$request->lista_id_idioma;
        }
        else{
            $id_idioma=$request->id_idioma;
            $id=$request->id_idioma;
            $nombre_idioma=$request->lista_id_idioma;
        }


    try{
        if($this->validadata($request, $msg,1)){

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

                $nombre=$curso->ruta;

                }
                $curso->id_idioma   = $id_idioma;
                $curso->codigo      = $request->codigo;
                $curso->nombre      = $request->nombre_curso;
                $curso->descripcion = $request->descri_curso;
                $curso->precio      = $request->precio_curso;
                $curso->ruta        = $nombre;

                $curso->activo      = $request->activo_curso;

                $curso->save();

                 $_class = "alert alert-success";
                 $error_msg = "Almacenado correctamente.";

                return view($this->path.'.create', compact('error_msg','_class','id','nombre_idioma'));


        }
        else{
            $error_msg = $msg;
            $_cod      = $request->codigo_paquete;
            $_nomb     = $request->nombre_paquete;
            $_descrip  = $request->descrip_paquete;
            $_precio   = $request->precio;
            $_ruta     = $request->ruta;
            $_class    = "alert alert-warning";

            return view($this->path.'.create', compact('idioma','id','nombre_idioma','error_msg', '_cod', '_nomb', '_descrip', '_ruta', '_precio', '_class'));


            }

       }
        catch(Exception $e){

            $error_msg =  $e->getMessage();
        }
        catch(\Illuminate\database\QueryException $e){
            $error_msg = $e->getMessage();
        }

        $_class = "alert alert-danger";

        return view($this->path.'.create', compact('idioma','id','nombre_idioma','error_msg', '_cod', '_nomb', '_descrip', '_ruta', '_precio', '_class'));



    }

    public function edit($id){

        $error_msg = "";
        $_cod      = "";
        $_class    = "";
        $_nomb     = "";
        $_descrip  = "";
        $_ruta     = "";
        $_precio     = "";

        $curso = Cursos::findOrFail($id);
        $idioma = Idiomas::all();
        $nombre_idioma=DB::table('Idiomas')->where('id_idioma', '=',$id)->first();
        $nombre_idioma=$nombre_idioma->nombre;






        return view($this->path.'.edit', compact('curso','idioma','nombre_idioma','id','error_msg', '_cod', '_nomb', '_descrip', '_ruta', '_precio', '_class'));


    }

    public function update(Request $request, $id){

        $error_msg = "";
        $_cod      = "";
        $_class    = "";
        $_nomb     = $request->nombre_curso;
        $_descrip  = $request->descrip_curso;
        $_ruta     = $request->ruta;
        $_precio     = $request->precio_curso;

        $curso = Cursos::findOrFail($id);
        $idioma = Idiomas::all();

        $nombre_idioma=DB::table('Idiomas')->where('id_idioma', '=',$id)->first();
        $nombre_idioma=$nombre_idioma->nombre;
        $id_idioma = $id;


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

                $nombre=$curso->ruta;

                #}
                $curso->id_idioma   = $id_idioma;
                $curso->codigo      = $request->codigo;
                $curso->nombre      = $request->nombre_curso;
                $curso->descripcion = $request->descri_curso;
                $curso->precio      = $request->precio_curso;
                $curso->ruta        = $nombre;

                $curso->activo      = $request->activo_curso;

                $curso->save();

                $_class = "alert alert-success";
                $error_msg = "Actualizado correctamente.";

                return view($this->path.'.edit', compact( 'curso','idioma','nombre_idioma','id','error_msg', '_cod', '_nomb', '_descrip', '_ruta', '_precio', '_class'));



            }
            catch(Exception $e){

                return $e->getMessage();
            }

        }
        else{
            $error_msg = $msg;
            $_cod      = $request->codigo;
            $_nomb     = $request->nombre_curso;
            $_descrip  = $request->descri_curso;
            $_precio   = $request->precio_curso;
            $_ruta     = $request->ruta;
            $_class    = "alert alert-warning";

            return view($this->path.'.edit', compact('curso','idioma','nombre_idioma','id','nombre_idioma','error_msg', '_cod', '_nomb', '_descrip', '_ruta', '_precio', '_class', '_id_idioma'));

       }

    }

    public function buscacurso()
    {
        //
        try{
            $codigo = Input::get('b_curso');
            $id_idioma  = Input::get('id_idioma');
            $data = DB::select('SELECT id_curso, id_idioma, codigo, nombre, descripcion, precio,activo
                                FROM Cursos
                                WHERE (codigo = ?)', [$codigo]);
            if($id_idioma){
                $idioma=DB::table('Idiomas')->where('id_idioma', '=', $id_idioma)->first();
            }
            //return $data;
            if(!is_null($data)){
                return view($this->path .'.show' ,compact('data','id_idioma','idioma'));
            }
            else{
                //return response('Data no encontrada, 404');
                echo ('Codigo de curso no encontrado');
                return view($this->path .'.show', compact('data', 'id_idioma','idioma'));
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
            $curso = Cursos::findOrFail($id);
            $curso->delete();
            return response()->json(array('msg'=> $id,'datos'=> $id), 200);
        }
        catch(Exception $e){

            return $e->getMessage();

        }

    }
}
