<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Response;

use App\Paquete_CursoModel;


class Paquete_CursoController extends Controller
{    
    private $path ='vendor.adminlte.paquetecurso';
    private $color_asociado    = "CCFFFF";
    private $color_noasociado  = "F5F5DC";

    //const ctt_color_asociado    = "dddddd"; //"#CCFFFF";
    //const ctt_color_noasociado = "F5F5DC";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view($this->path.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       

            try{

                $paquetecurso = new Paquete_CursoModel();

                               
                $paquetecurso->id_paquete  = $request->idpaquete;
                $paquetecurso->id_curso    = $request->idcurso;
                $paquetecurso->activo      = true;
                                               
                $paquetecurso->save();
                                
                return Response::json(array("_ok"       => 0,
                                            "_msg"      => "Asociado",
                                            "_checked"  => true,                                            
                                            //"_color"  => "#CCFFFF"                                        
                                            "_color"    =>  $this->color_asociado,
                                            "_flag"     => "On"                                            
                                      ));
                
            }
            catch(Exception $e){

                return Response::json(array("_ok" => -1,
                                            "_msg"  => $e->getMessage()                                            
                                     ));             
            } 
            catch(\Illuminate\database\QueryException $e){
                return Response::json(array("_ok" => -1,
                                            "_msg"  => $e->getMessage(),                                            
                                     ));            
            }                                                  
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //               

        try{
            //$_idpaquete  = $id->idpaquete;
            //$_idcurso    = $id->idcurso;

           
            DB::delete('delete from Paquetes_Cursos  where id_paquete = ? and id_curso = ?', 
            [$id->idpaquete, $id->idcurso]);
                        
            return Response::json(array("_ok" => 0,
                                        "_msg"  => "No Asociado " . $id->idpaquete . " idcurso: ". $id->idcurso,
                                        "_checked"  => false,                                        
                                        //"_color"  => "#F5F5DC"                                        
                                        "_color"  => $this->color_noasociado
                                      ));
        }
        catch(Exception $e){
            return Response::json(array("_ok" => -1,
                                        "_msg"  => $e->getMessage()
                                 ));

                              
        } 
        catch(\Illuminate\database\QueryException $e){            
            return Response::json(array("_ok" => -1,
                                        "_msg"  => $e->getMessage()
                                 ));            
        }       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       // return $id;
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
               		
    }


    /**
     * Función que permite activar o desactivar un curso para un paquete específico.
     */
    public function update_paquetecurso(Request $request)
    {
     
        try{
          
           if(DB::update('UPDATE Paquetes_Cursos SET activo = :_new_status
                        WHERE id_paquete = :_idpaquete AND id_curso = :_idcurso', 
            ['_new_status'=>$request->activo,
             '_idpaquete' =>$request->idpaquete,
             '_idcurso'   =>$request->idcurso
             ]) == 1
           )
           {
                if($request->activo){
                    $msg = "Curso Habilitado.";
                    $flag = "On";                    
                }                    
                else {
                    $msg = "Curso Deshabilitado.";
                    $flag = "Off";
                } 
                    
    
                return Response::json(array("_ok" => 0,
                                            "_msg"  => $msg,
                                            "_flag" => $flag                                            
                                            ));
            }
            else
                return Response::json(array("_ok" => -1,
                                            "_msg"  => "Curso no asociado."                                            
                                            ));

            
        }
        catch(Exception $e){
            return Response::json(array("_ok" => -1,
                                        "_msg"  => $e->getMessage()
                                 ));

                              
        } 
        catch(\Illuminate\database\QueryException $e){            
            return Response::json(array("_ok" => -1,
                                        "_msg"  => $e->getMessage()
                                 ));            
        }
   
    } //Fin function update_paqcurso(Request $request)
   


    //Función que permite obtener los cursos asociados a un paquete específico
    //$_idpaq recibe el id del paquete a consultar
    private function cursos_asociados($_id_paq, $_id_idioma, &$_error_msg){
        try{                                   
                         
             if((is_null($_id_idioma)) or (empty($_id_idioma)))
             {
                 $_id_idioma = 0;
                 $_id_idiomaaux = $_id_idioma;
             }
             else{
                 $_id_idiomaaux = -1;
             }
             
             $cursosasociados = DB::select('SELECT PC.id_paq_curso, C.id_curso, C.codigo, C.nombre AS curso, PC.activo, CASE WHEN ISNULL(PC.id_paquete) THEN -1 ELSE PC.id_paquete END AS id_paquete, CASE WHEN NOT ISNULL(PC.id_paquete) THEN 1 ELSE 0 END AS asociado, CASE WHEN NOT ISNULL(PC.id_paquete) THEN  :_color_a  ELSE :_color_b END AS color, I.nombre as idioma
                                            FROM Cursos AS C
                                            LEFT JOIN	Paquetes_Cursos AS PC ON (C.id_curso = PC.id_curso) AND (PC.id_paquete = :_idpaq) 
                                            LEFT JOIN	Paquetes AS P ON (P.id_paquete = PC.id_paquete) 
                                            LEFT JOIN	Idiomas   AS I ON (I.id_idioma = C.id_idioma) 
                                            WHERE ((I.id_idioma = :_id_idioma) OR (:_id_idiomaaux = 0))
                                           ',
                                           ['_color_a'=>$this->color_asociado, '_color_b'=>$this->color_noasociado, '_idpaq'=>$_id_paq, '_id_idioma'=>$_id_idioma, '_id_idiomaaux'=>$_id_idiomaaux]
                                           );
              $_error_msg = "";
             
              if(is_null($cursosasociados) || empty($cursosasociados)){
                $cursosasociados = [];
              } 
              
              return $cursosasociados;             
              
        }
        catch(exception $e){
            $_error_msg = $e->getMessage();
            return [];
         } 
         catch(\Illuminate\database\QueryException $e){
            $_error_msg = $e->getMessage();
            return [];

        }


    }
    
    /**
     * Función que permite obtener los cursos existentes por idioma
     */
    public function cursosbyidioma()
    {                  
        try{                                   
            $_cod_paq   = Input::get('cod_paq');
            $_paquete   = Input::get('nomb_paq');
            $_id_paq    = Input::get('id_paq');
            $_id_idioma = Input::get('id_idioma');
                                    
            if((is_null($_id_idioma)) or (empty($_id_idioma)))
            {
                $_id_idioma = 0;
                $_id_idiomaaux = $_id_idioma;
            }
            else{
                $_id_idiomaaux = -1;
            }
            
          
            $cursosasociados = $this->cursos_asociados($_id_paq, $_id_idioma, $_error_msg);
                                                                                                          
            $_idiomas   = DB::select('SELECT id_idioma, nombre AS idioma
            FROM Idiomas
            WHERE activo = true');

            if(is_null($_idiomas) || empty($_idiomas)){
                $_idiomas = [];
            }
            
            //dd($_error_msg);
            return view($this->path . '.create', compact('cursosasociados', '_paquete', '_cod_paq', '_id_paq', '_idiomas', '_id_idioma', '_error_msg'));
        }
        catch(exception $e){
           return $e->getMessage();

           $cursosasociados = [];
           $_idiomas        = [];
           $_error_msg = $e->getMessage();
           return view($this->path . '.create', compact('cursosasociados', '_paquete', '_cod_paq', '_id_paq', '_idiomas', '_id_idioma', '_error_msg'));
        }  
                
    }//Fin public function cursosbyidioma()


    //Autor: Arístides Cortesía
    //Descripción: Función que permite asociar o desasociar un curso de un paquete.
    //$request   : Objeto tipo Request que recibe toda la información del curso y el paquete a asociar.
    public function actualizar_paquetecurso(Request $request)
    {              
        if($request->ajax()){              
            if($request->asociar){                              
               return $this->store($request);                          
            }
            else{                 
               return $this->destroy($request);                           
            }
                                                         
         }
         else //Finif($request->ajax())
             return view($this->path . '.index'); 
    }// Fin public function actualizar_paquetecurso(Request $request)

    //Autor: Arístides Cortesía
    //Descripción: Función que permite asociar curso de un paquete.
    //$request   : Objeto tipo Request que recibe toda la información del curso y el paquete a asociar.
    public function agrega_paquetecurso(Request $request)
    {              
        if($request->ajax()){                          
               return $this->store($request);                                                                                               
         }
         else //Finif($request->ajax())
             return view($this->path . '.index'); 
    }// Fin public function actualizar_paquetecurso(Request $request)

    //Autor: Arístides Cortesía
    //Descripción: Función que permite eliminar curso  asociado a un paquete (Desasociar).
    //Nota       : Si un paquete ha sido vendido los cursos no se podrán eliminar. Esta validación
    //             se realizará desde la tabla Paquetes_Cursos con un trigger. 
    //$request   : Objeto tipo Request que recibe toda la información del curso y el paquete a asociar.
    public function eliminar_paquetecurso(Request $request)
    {              
        if($request->ajax()){                                           
               return $this->destroy($request);                                                                                                
         }
         else //Finif($request->ajax())
             return view($this->path . '.index'); 
    }// Fin public function eliminar_paquetecurso(Request $request)

   
    public function miscursos(Request $request){        
        if($request->ajax()){
            
             try{                                   
                  $_id_paq    = $request->idpaquete;
                  $_id_idioma = $request->idcurso;
                               
                    if((is_null($_id_idioma)) or (empty($_id_idioma)))
                    {
                        $_id_idioma = 0;
                        $_id_idiomaaux = $_id_idioma;
                    }
                    else{
                        $_id_idiomaaux = -1;
                    }
                   
                                                 
                    $_error_msg = "";
                    $cursosasociados = $this->cursos_asociados($_id_paq, $_id_idioma, $_error_msg);

                    if ($_error_msg === ""){
                        return response()->json(array('_ok'=> 0,'_msg'=> $cursosasociados), 200); 
                    }
                    else{
                        return response()->json(array('_ok'=> -1,'_msg'=> $_error_msg), 200); 
                    }
                    
                    
              }
              catch(exception $e){
                   //return $e->getMessage();
                   return response()->json(array('_ok'=> -1,'_msg'=> $e->getMessage()), 200); 
               } 

         }
    }//Fin miscursos(Request $request)
    
}
