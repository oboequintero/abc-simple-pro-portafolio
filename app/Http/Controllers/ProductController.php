<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Session;
use App\Http\Requests;
use App\Product;

use App\Idiomas;
use App\Cursos;
use App\Lecciones;
use App\Niveles;

use DB;
use Storage;
use Exception;


use App\Http\Controllers\Controller;

class ProductController extends Controller
{
private $path ='vendor.adminlte.product';

public function index(){
  
  $data = DB::select('(SELECT P.id, "Cursos" as Tipo, C.id_curso, C.codigo, C.descripcion, C.precio, P.activo 
                            FROM products P
                                    INNER JOIN  Cursos C on P.id_curso = C.id_curso) 
UNION ALL
 
(SELECT P.id,"Paquetes" as Tipo, Pa.id_paquete, Pa.codigo, Pa.descripcion, Pa.precio , P.activo
                            FROM products P
                                    INNER JOIN   Paquetes Pa on Pa.id_paquete = P.id_paquete)
 UNION ALL          

(SELECT P.id,"Promociones" as Tipo, Pr.id_promocion, Pr.codigo, Pr.descripcion, Pr.precio , P.activo
                            FROM products P
                                    INNER JOIN   Promociones Pr on Pr.id_promocion = P.id_promocion)');


  /* $data = DB::select('(SELECT P.id AS id, C.id_curso AS id_curso , C.codigo AS codigo, C.descripcion AS descripcion, C.precio AS precio, P.activo AS activo 
                            FROM products AS P INNER JOIN  Cursos AS C on P.id_curso = C.id_curso) 
                            UNION ALL
                      (SELECT P.id AS id, PA.id_paquete AS id_paquete , PA.codigo AS codigo, PA.descripcion AS descripcion, PA.precio AS precio, PA.activo AS activo 
                            FROM products AS P INNER JOIN  PAQUETES AS PA on P.id_paquete = PA.id_paquete)
                            UNION ALL
                      (SELECT P.id AS id, PR.id_promocion AS id_promocion , PR.codigo AS codigo, PR.descripcion AS descripcion, PR.precio AS precio, PR.activo AS activo 
                            FROM products AS P INNER JOIN  PROMOCIONES AS PR on P.id_promocion = PR.id_promocion)'); */


        return view($this->path.'.index', compact('data'));
   # }

}





    public function show ($id_categoria,$id)
    {

        $id_user = Auth::id();
        # BUSCA EL PRODUCTO SE ENCUENTRA EN LA TABLA VENTAS SEGUN EL USUARIO ACTIVO PARA NO MOSTRAR EL BOTON DE AGREGAR AL CARRITO
            
       $producto_adquirido = DB::table('Ventas AS V')
                        ->join('Ventas_detalle AS VD', 'V.id_venta', '=', 'VD.id_venta') 
                        ->select('VD.id_producto AS id_producto')
                        ->where('VD.id_producto', '=', $id)
                        ->where(function ($query) {
                        $query->where('V.id_user', '=', $id_user = Auth::id());
                        })
                        ->first();

        

         # o si id_curso de la tabla product != de is_null(var)

        if($id_categoria==1){# Si la categoria es Cursos

            $product = DB::table('products AS P')
                        ->join('Cursos AS C', 'C.id_curso', '=', 'P.id_curso') 
                 
                        ->select('C.codigo AS codigo','C.nombre AS nombre', 'C.descripcion AS descripcion', 'C.precio AS precio', 'P.id AS id', 'P.imagen AS imagen')
                        ->where('P.id', '=', $id )->first();

            $interested = DB::table('products AS P')
                        ->join('Cursos AS C', 'C.id_curso', '=', 'P.id_curso') 
                 
                        ->select('C.codigo AS codigo','C.nombre AS nombre', 'C.descripcion AS descripcion', 'C.precio AS precio', 'P.id AS id', 'P.imagen AS imagen', 'P.id_categoria AS id_categoria')
                        ->where('P.id', '!=', $id )->get();

            
        #return view('product.index')->with(['product' => $product, 'interested' => $interested, 'id_categoria' => $id_categoria,'producto_adquirido' => $producto_adquirido]);  

        return view($this->path . ".show", compact('product','interested','id_categoria','producto_adquirido'));

        }
        elseif($id_categoria==2){ # Si la categoria es paquetes
        
        $product = DB::table('products AS P')
                        ->join('Paquetes AS C', 'C.id_paquete', '=', 'P.id_paquete') 
                 
                        ->select('C.codigo AS codigo','C.nombre AS nombre', 'C.descripcion AS descripcion', 'C.precio AS precio', 'P.id AS id', 'P.imagen AS imagen')
                        ->where('P.id', '=', $id )->first();
        $interested = DB::table('products AS P')
                        ->join('Paquetes AS C', 'C.id_paquete', '=', 'P.id_paquete') 
                 
                        ->select('C.codigo AS codigo','C.nombre AS nombre', 'C.descripcion AS descripcion', 'C.precio AS precio', 'P.id AS id', 'P.imagen AS imagen', 'P.id_categoria AS id_categoria')
                        ->where('P.id', '!=', $id )->get();

           

       /* $paquete_curso  = DB::table('products AS P')
                        ->join('paquetes_curso AS PC', 'P.id_paquete', '=', 'PC.id_paquete')
                        ->join('Cursos AS CU', 'CU.id_curso', '=', 'PC.id_curso')                 
                        ->select('CU.codigo AS codigo','CU.nombre AS nombre', 'CU.descripcion AS descripcion', 'CU.precio AS precio', 'CU.id_curso AS id')
                        ->where('P.id', '=', $id )->get(); */


        #return view('product.show')->with(['product' => $product, 'interested' => $interested, 'paquete_curso' => $paquete_curso, 'id_categoria' => $id_categoria,'producto_adquirido' => $producto_adquirido]);  


        return view($this->path . ".show", compact('product','interested','id_categoria','producto_adquirido'/*,'paquete_curso' */));

          }
        
        elseif($id_categoria==3){ # Si la categoria es promociones
        
            $product = DB::table('products AS P')
                        ->join('Promociones AS C', 'C.id_promocion', '=', 'P.id_promocion') 
                 
                        ->select('C.codigo AS codigo','C.nombre AS nombre', 'C.descripcion AS descripcion', 'C.precio AS precio', 'P.id AS id', 'P.imagen AS imagen')
                        ->where('P.id', '=', $id )->first();

             $interested = DB::table('products AS P')
                        ->join('Promociones AS C', 'C.id_promocion', '=', 'P.id_promocion') 
                 
                        ->select('C.codigo AS codigo','C.nombre AS nombre', 'C.descripcion AS descripcion', 'C.precio AS precio', 'P.id AS id', 'P.imagen AS imagen', 'P.id_categoria AS id_categoria')
                        ->where('P.id', '!=', $id )->get();

        $promocion_curso  = DB::table('products AS P')
                        ->join('promocion_curso AS PC', 'P.id_promocion', '=', 'PC.id_promocion')
                        ->join('Cursos AS CU', 'CU.id_curso', '=', 'PC.id_curso')                 
                        ->select('CU.codigo AS codigo','CU.nombre AS nombre', 'CU.descripcion AS descripcion', 'CU.precio AS precio', 'CU.id_curso AS id')
                        ->where('P.id', '=', $id )->get();
#ESTA PARTE ESTA INCOMPLETA O FALTA PASARLA COMO PARAMETRO HAY QUE REVISAR
        $promocion_paquete  = DB::table('products AS P')
                        ->join('promocion_paquete AS PP', 'P.id_promocion', '=', 'PP.id_promocion')
                        ->join('Paquetes AS PA', 'PA.id_paquete', '=', 'PP.id_paquete')                 
                        ->select('PA.codigo AS codigo','PA.nombre AS nombre', 'PA.descripcion AS descripcion', 'PA.precio AS precio', 'PA.id_paquete AS id')
                        ->where('P.id', '=', $id )->get();



        #return view('product.show')->with(['product' => $product, 'interested' => $interested, 'id_categoria' => $id_categoria, 'promocion_curso' => $promocion_curso, 'promocion_paquete' => $promocion_paquete,'producto_adquirido' => $producto_adquirido]);

        return view($this->path . ".show", compact('product','interested','id_categoria','producto_adquirido', 'promocion-curso'));  
          }         
    }

        public function edit($id){

        $data = Product::findOrFail($id);
        return view($this->path.'.edit', compact('data'));
    }

    public function update(Request $request,$id){

        $data = Product::findOrFail($id);

        $data->activo       = $request->activo;
        $data->save();
        $id = 0;
        //return redirect()->route($this->path.'.show',0);

        return $this->index();

    }









}



