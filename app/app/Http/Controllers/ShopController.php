<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Cursos;
use Illuminate\Support\Facades\Auth;
use Session;


class ShopController extends Controller
{
     private $path ='vendor.adminlte.shop';

     public function index($id)# $id pertenece al id de la categoria 1. Cursos| 2. Promociones| 3. Paquetes
    {
        $id_user = Auth::id(); # aHORA vOY A PASAR EL ID DEL CLIENTE EN VEZ DEL ID USER

        $id_cliente = 16;
        # SE BUSCA QUE PRODUCTOS SE ENCUENTRAN EN LA TABLA VENTAS SEGUN EL USUARIO ACTIVO PARA NO MOSTRAR EL BONTON DE AGREGAR AL CARRITO

        /*$productos_adquiridos = DB::table('Ventas AS V')
                        ->join('Ventas_detalle AS VD', 'V.id_venta', '=', 'VD.id_venta')

                        ->select('VD.id_producto AS id_producto')
                        ->where('V.id_user', '=', $id_user )
                        ->get();

        */






        #return view('shop.show')->with(['products' => $products, 'productos_adquiridos' => $productos_adquiridos]);

        if($id == 1)
    	{

        /*$products = DB::table('products')

                    ->whereNotNull('id_curso')
                    ->get();*/

        /* $products = DB::select('SELECT     C.id_curso AS id_curso,C.codigo AS codigo,C.nombre AS nombre,C.descripcion AS descripcion,
                                C.precio AS precio,P.id AS id,P.id_categoria AS id_categoria,P.imagen AS imagen,
                                CASE WHEN  compra(C.id_curso,1)  IS NULL THEN 0 ELSE 1 END
                                FROM            Cursos AS C
                                INNER JOIN products AS   P ON C.id_curso = P.id_curso
                                WHERE    (P.id_categoria =  :_id)
                                ' , ['_id'=>$id] ); */

         $products = DB::table('Cursos AS C')
                        ->join('products AS P', 'C.id_curso', '=', 'P.id_curso')

                        ->select('C.id_curso AS id_curso','C.codigo AS codigo','C.nombre AS nombre', 'C.descripcion AS descripcion', 'C.precio AS precio', 'P.id AS id', 'P.id_categoria AS id_categoria', 'P.imagen AS imagen', DB::raw('CASE WHEN  compra2(P.id,'.$id_user.')  IS NULL THEN 0 ELSE 1 END AS valor'))
                        ->where('P.id_categoria', '=', $id )
                        ->get();

       #return view('shop.index')->with(['products' => $products /*, 'productos_adquiridos' => $productos_adquiridos */]);
        return view($this->path . ".index", compact('products'));



        }

        elseif ($id==2) {

            //dd($id_user);

        $products = DB::table('Paquetes AS C')
                        ->join('products AS P', 'C.id_paquete', '=', 'P.id_paquete')

                        ->select('C.id_paquete AS id_paquete','C.codigo AS codigo','C.nombre AS nombre', 'C.descripcion AS descripcion', 'C.precio AS precio', 'P.id AS id', 'P.id_categoria AS id_categoria', 'P.imagen AS imagen',DB::raw('CASE WHEN  compra2(P.id,'.$id_user.')  IS NULL THEN 0 ELSE 1 END AS valor'))
                        ->where('P.id_categoria', '=', $id )
                        ->get();

        #return view('shop.show')->with(['products' => $products]);
        # view('shop.show')->with(['products' => $products, 'productos_adquiridos' => $productos_adquiridos]);
        return view($this->path . ".index", compact('products'));



        }
        elseif ($id ==3) {
            $products = DB::table('Promociones AS C')
                        ->join('products AS P', 'C.id_promocion', '=', 'P.id_promocion')

                        ->select('C.id_promocion AS id_promocion','C.codigo AS codigo','C.nombre AS nombre', 'C.descripcion AS descripcion', 'C.precio AS precio', 'P.id AS id', 'P.id_categoria AS id_categoria', 'P.imagen AS imagen', DB::raw('CASE WHEN  compra2(P.id,'.$id_user.')  IS NULL THEN 0 ELSE 1 END AS valor'))#laimagen viene del producto
                        ->where('P.id_categoria', '=', $id )
                        ->get();


        #return view('shop.show')->with(['products' => $products]);
        return view($this->path . ".index", compact('products'));
        }
    }


}
