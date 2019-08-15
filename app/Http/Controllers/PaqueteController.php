<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Response;

//use Illuminate\Support\Facades\Hash;


use \App\PaqueteModel;

class PaqueteController extends Controller
{
    //private $path = 'paquete';
    private $path ='vendor.adminlte.paquete';

    ///////////////////
    /**
     * Función que permite realizar la búsqueda de un paquete según el id.
     * Si la consulta es satisfactoria, retorna el objeto paquete con sus valores;
     * en caso contrario retorna el objeto paquete vacío.
     * $_data:      Recibe el id del paquete a buscar.
     * $_error_msg: Parámetro por referencia que retorna el mensaje de error, en caso de que ocurra,
     *              por el contrario retorna vacío.
     * $_class:     Parámetro por referencia que retorna el tipo de clase a aplicar al div de mensajes.
     */    
    private function find_data_2($_data, &$_error_msg, $_class)    
    {      
        $error_msg = "";
        $_class    = "";

        try{
  
        
            // $paquete = DB::table('Paquetes')           
            // ->select('id_paquete', 'codigo', 'nombre', 'descripcion', 'activo')
            // ->where('id_paquete', $_data)
            // ->orwhere('nombre', $_data)
            // ->orwhere('codigo', $_data)
            // ->first();
           
            $paquetes = [];
            $paquetes = DB::select('SELECT id_paquete, codigo, nombre, descripcion, ruta, precio, activo
                                    FROM Paquetes
                                    WHERE (id_paquete = :_idpaq) OR (codigo = :_cod)
                                      OR (nombre LIKE :_nomb) OR (descripcion LIKE :_descrip) 
                                    ORDER BY posicion',
                                      ['_idpaq'=>$_data, '_nomb'=>'%'. $_data .'%', '_cod'=>$_data, '_descrip'=> '%' . $_data . '%']);
                                      

            if ((!is_null($paquetes)) && (!empty($paquetes)))          
            {                
                    //if(!($_orden == '.index'))
                    //{                            
                       $paquetes = $paquetes[0];                                                       
                    //}                                   
            }
            else{
                
                //paquetes = [];
                $error_msg = "No se encontró la data.";
                $_class    = "alert alert-warning";
                
            }
                        
        }   
        catch(Exception $e){            
            $error_msg = $e->getMessage();
            $_class    = "alert alert-danger";
        }
        catch(\Illuminate\database\QueryException $e){
            $error_msg = $e->getMessage();  
            $_class    = "alert alert-danger";          
        }  
        
        //return view($this->path . $_orden, compact('paquetes', '_data', 'error_msg'));
        return $paquetes;
    }
    ///////////////////

    /**
     * Función que permite realizar la búsqueda de un paquete según el id.
     * Si $edit es true retorna la vista de edición, en caso contrario 
     * retorna la vista show.
     */    
    private function find_data($_data, $_orden)    
    {      
        $error_msg = "";

        try{
  
        
            // $paquete = DB::table('Paquetes')           
            // ->select('id_paquete', 'codigo', 'nombre', 'descripcion', 'activo')
            // ->where('id_paquete', $_data)
            // ->orwhere('nombre', $_data)
            // ->orwhere('codigo', $_data)
            // ->first();
           
            $paquetes = [];
            $paquetes = DB::select('SELECT id_paquete, codigo, nombre, descripcion, ruta, precio, activo
                                    FROM Paquetes
                                    WHERE (id_paquete = :_idpaq) OR (codigo = :_cod)
                                      OR (nombre LIKE :_nomb) OR (descripcion LIKE :_descrip) 
                                    ORDER BY posicion',
                                      ['_idpaq'=>$_data, '_nomb'=>'%'. $_data .'%', '_cod'=>$_data, '_descrip'=> '%' . $_data . '%']);
                                      

            if ((!is_null($paquetes)) && (!empty($paquetes)))          
            {                
                    if(!($_orden == '.index'))
                    {                            
                       $paquetes = $paquetes[0];                                                       
                    }                                   
            }
            else{
                
                //paquetes = [];
                $error_msg = "No se encontró la data.";
                
            }
                        
        }   
        catch(Exception $e){            
            $error_msg = $e->getMessage();
        }
        catch(\Illuminate\database\QueryException $e){
            $error_msg = $e->getMessage();            
        }  
        
        return view($this->path . $_orden, compact('paquetes', '_data', 'error_msg'));
    }

    /**
     * Mostrar listado de todos los paquetes existentes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         return $this->find_data('', '.index');
                  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
        $error_msg = "";        
        $_cod      = ""; 
        $_nomb     = ""; 
        $_descrip  = "";
        $_ruta     = "";
        $_precio   = "";
        $_class    = "";
                        
        return view($this->path.'.create', compact('error_msg', '_cod', '_nomb', '_descrip', '_ruta', '_precio', '_class'));
    }

    /**
     * Función que valida que los datos del paquete a crear no sean nulos o vacío
     */
    function validadata($request, &$msg){
      
        if(empty($request->precio) or is_null($request->precio)){
            $request->precio = "00";
        }

        if(empty($request->codigo_paquete) or is_null($request->codigo_paquete)){
            $msg = "Debe introducir el código del paquete.";           
            return false;
        }
        else
        if(empty($request->nombre_paquete) or is_null($request->nombre_paquete)){
            $msg = "Debe introducir el nombre del paquete.";            
            return false;
        }
        else
        if(empty($request->descrip_paquete) or is_null($request->descrip_paquete)){
            $msg = "Debe introducir la descripción del paquete.";
            return false;
        }
        else
        if($request->precio < 0){
            $msg = "el precio no puede ser menor a cero.";
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
        $_cod      = ""; 
        $_nomb     = ""; 
        $_descrip  = "";
        $_ruta     = "";
        $_precio   = "";
        $msg       = "";  
        $_class    = "";   

                
        
        //dd($request->codigo_paquete . "   P2" . $request->codigo_paquete2 . " ****R " . $request->registrarpaq);
        try{

			/*$data = new PaqueteModel();
            
            
            $data->codigo 		= $request->codigo_paquete;
			$data->nombre 		= $request->nombre_paquete;
			$data->descripcion	= $request->descrip_paquete;
            $data->activo 		= $request->activo_paquete;
            
            $data->save();
            */
            
            
           if($this->validadata($request, $msg)){
                                        
                   /* DB::INSERT('INSERT INTO Paquetes(codigo, nombre, descripcion, activo, posicion)
                            VALUE(:cod, :nomb, :descrip, :activo, (SELECT MAX(posicion) + 1 FROM Paquetes AS Paq))',
                            [   'cod'    =>$request->codigo_paquete,
                                'nomb'   =>$request->nombre_paquete,
                                'descrip'=>$request->descrip_paquete,
                                'activo' =>$request->activo_paquete                        
                            ]
                    );*/


                    DB::INSERT('INSERT INTO Paquetes(codigo, nombre, descripcion, precio, activo, ruta, posicion)
                            VALUE(:cod, :nomb, :descrip, :precio, :activo, :ruta, (SELECT MAX(posicion) + 1 FROM Paquetes AS Paq))',
                            [   'cod'    =>$request->codigo_paquete,
                                'nomb'   =>$request->nombre_paquete,
                                'descrip'=>$request->descrip_paquete,
                                'precio' =>$request->precio,
                                'activo' =>$request->activo_paquete,                        
                                'ruta'   =>$request->ruta
                            ]
                    );

                    //return redirect()->route($this->path.'.index');
                    //return view($this->path . '.index');
                    if($request->registrarpaq == 1)
                        return view($this->path.'.create', compact('error_msg', '_cod', '_nomb', '_descrip', '_ruta', '_precio', '_class'));
                    else                    
                        return $this->find_data('', '.index');
           }
            else{
                $error_msg = $msg;
                $_cod      = $request->codigo_paquete; 
                $_nomb     = $request->nombre_paquete;
                $_descrip  = $request->descrip_paquete;
                $_precio   = $request->precio;
                $_ruta     = $request->ruta;
                $_class    = "alert alert-warning";
                
                return view($this->path.'.create', compact('error_msg', '_cod', '_nomb', '_descrip', '_ruta', '_precio', '_class'));
             
           }
       	}
		catch(Exception $e){

            $error_msg =  $e->getMessage();          
        }
        catch(\Illuminate\database\QueryException $e){
            $error_msg = $e->getMessage();            
        }
              
        $_class = "alert alert-danger";
        
        return view($this->path.'.create', compact('error_msg', '_cod', '_nomb', '_descrip', '_ruta', '_precio', '_class'));        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {           
        return $this->find_data($id, '.show');        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        /* $encripta = Hash::make($id);         

        //return $encripta;
        if(Hash::check($id, $encripta)){
            return 'ok';
        } */
        
        $id  =  Input::get('id_paq');
       // return $this->find_data($id, '.edit');



        $paquete=[];
        $_id_paquete  = "";
        $_codigo      = "";
        $_nombre      = "";
        $_descripcion = "";
        $_precio      = "";
        $_ruta        = "";
        $_activo      = "";
        $_error_msg   = "";
        $_class       = "";
        $_activo      = "";
        $_display     = "";

        $paquete = $this->find_data_2($id, $_error_msg, $_class);                

        
        if ((!is_null($paquete)) && (!empty($paquete))){
            
            $_id_paquete  = $paquete->id_paquete;
            $_codigo      = $paquete->codigo;
            $_nombre      = $paquete->nombre;
            $_descripcion = $paquete->descripcion;
            $_ruta        = $paquete->ruta;
            $_precio      = $paquete->precio;
            $_activo      = $paquete->activo;
            
            
            if(!empty($_error_msg)){                
                $_display = "display:block";
            } 
            else{
                $_display = "display:none";
            }

            return view($this->path.'.edit', compact('_error_msg', '_id_paquete', '_codigo', '_nombre', '_descripcion', '_ruta', '_precio', '_activo', '_class', '_display'));             
        }          
    }

    /**
     * Función que realiza la búsqueda del paquete 
     * según el valor del parámetro busca_paq"
     */
    public function buscarpaquetes()
    {      
        $_data  =  Input::get('busca_paq');
                
        return $this->find_data($_data, '.index');        
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
        //  
                
        $paquetes  = [];
        $_data     = "";

        $_id_paquete  = "";
        $_codigo      = "";
        $_nombre      = "";
        $_descripcion = "";
        $_ruta        = "";
        $_precio      = "";
        $_activo      = "";
        $_error_msg   = "";
        $_class       = "";
        $_display     = "";


        $_id_paquete  = $id;
        $_codigo      = $request->codigo_paquete;
        $_nombre      = $request->nombre_paquete;
        $_descripcion = $request->descrip_paquete;
        $_ruta        = $request->ruta;
        $_precio      = $request->precio;
        $_activo      = $request->status;

                
        if($this->validadata($request, $msg)){
                try{
                    
                    DB::update('update Paquetes set nombre = ?, descripcion = ?, ruta = ?, precio = ?, activo = ?
                    where id_paquete = ?', 
                    [$request->nombre_paquete,
                    $request->descrip_paquete,
                    $request->ruta,
                    $request->precio,
                    $request->status,
                    $id]);

                    //Funciona
                    //  DB::statement('UPDATE Paquetes SET activo = ? WHERE id_paquete = ?', 
                    //  array($request->status, $id));
                    
                    //return redirect()->route($this->path.'.index');
                    return $this->find_data('', '.index');
                }
                catch(exception $e){
                    $error_msg = $e->getMessage();
                } 
                catch(\Illuminate\database\QueryException $e){
                    $error_msg = $e->getMessage();                      
                }       		

                return view($this->path . '.index', compact('paquetes', '_data', 'error_msg')); 
        }//if($this->validadata($request, $msg))
        else{
            $_error_msg = $msg;  
            $_display = "display:block"; 
            $_class    = "alert alert-warning";         
                     
            return view($this->path.'.edit', compact('_error_msg', '_id_paquete', '_codigo', '_nombre', '_descripcion', '_ruta', '_precio', '_activo', '_class', '_display'));                     
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
        $error_msg = "";
        $_data    = "";
        $paquetes = [];
        
        
        try{
            DB::delete('delete from Paquetes 
            where id_paquete = ?', 
            [$id->id]);

        
            return Response::json(array("_ok" => 0,
                                        "_msg"  => "Se ha eliminado el paquete " . $id->paq                                                                               
                                      ));
        }
        catch(exception $e){            
            return Response::json(array("_ok" => 5,
                                        "_msg"  => $e->getMessage()                                      
                                      ));
        }
        catch(\Illuminate\database\QueryException $e){        
            //$error_msg = $e->getCode();
            //$error_msg = $e->getMessage();        
            return Response::json(array("_ok" => 5,
                                        "_msg"  => $e->getMessage()                                       
                                      ));
        }
                  
        //return view($this->path . '.index', compact('paquetes', '_data', 'error_msg'));        
        
    }

    //Función que permite ejutar el llamado a destroy para eliminar paquete
    public function eliminar_paquete(Request $request)
    {        
        if($request->ajax())
        {  
            return $this->destroy($request);                            
        }                              
    }

    /**
     * Fecha: 28/12/2018
     * Autor: Arístides Cortesía.
     * Descripciãn: Función que permite la reordenar los elementos de un db según los parámeros ecibidos
     * Parámetros   :
     *  $_pag_ini   : Recibe el valor que define el inicio de la repaginación.
     *  $_pag_fin   : Recibe el valor que define el final de la repaginación.      
     */    
      function repaginar($_pag_ini, $_pag_fin){
    
           if($_pag_ini > $_pag_fin){

                $aux = $_pag_fin;
                $_pag_fin = $_pag_ini;
                $_pag_ini = $aux; 
                
                $izq = false; 
                $comparador = $_pag_fin;
                $sustituto  = $_pag_ini;

           }
           else{
                $izq = true;
                $comparador = $_pag_ini;
                $sustituto  = $_pag_fin;

           }

           DB::beginTransaction();
           try
           {
                    DB::update('UPDATE Paquetes SET posicion = posicion * -1
                                        
                                WHERE (posicion >= :pag_ini) AND (posicion <= :pag_fin)',
                                        ['pag_ini'=>$_pag_ini, 'pag_fin'=>$_pag_fin]
                    );
                                  
                    
                    DB::update('UPDATE Paquetes SET posicion = CASE WHEN ((posicion < 0) AND ((posicion * -1) = :comparador))
                                                                THEN  :sustituto
                                                                ELSE
                                                                    CASE WHEN (posicion < 0)
                                                                        THEN
                                                                            CASE WHEN Not :Izq 
                                                                                 THEN ((posicion * -1) + 1)
                                                                                 ELSE ((posicion * -1) - 1)
                                                                            END
                                                                        ELSE
                                                                            posicion																																						 
                                                                    END
                                                            END
                                        WHERE (posicion < 0)',
                                        ['comparador' => $comparador, 'sustituto' => $sustituto, 'Izq' => $izq]
                    );

                
                    DB::commit();

                    return Response::json(array("_ok" => 0,
                                                "_msg"  => "Repaginación completa."
                                                
                                                ));
            }
            catch(exception $e){
                $_error_msg = $e->getMessage();
                DB::rollback();

                return Response::json(array("_ok" => -1,
                                                "_msg"  => "Error123: " . $_error_msg
                                            ));                
             } 
             catch(\Illuminate\database\QueryException $e){
                $_error_msg = $e->getMessage();
                DB::rollback();

                return Response::json(array("_ok" => -1,
                                                "_msg"  => "Error456: " . $_error_msg
                                            ));
    
            }
    } //function repaginar

    public function reordenar(Request $request){   

        return $this->repaginar($request->posc_ini, $request->posc_fin, $request->izq, $request->comparador, $request->sustituto);                            
    }
            
}
