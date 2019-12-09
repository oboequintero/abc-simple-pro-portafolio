<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Session;
use App\Http\Requests;
use DB;
use Storage;
use Exception;


class VentaController extends Controller
{

 private $path ='vendor.adminlte.venta';
 private $path1 ='vendor.adminlte.venta_detalle';



 public function index(){
  
  $data = DB::select('(SELECT P.id_user, P.id_venta, P.fecha, P.total, C.name, C.email FROM Ventas P INNER JOIN  Clientes C on P.id_cliente = C.id)');

  /*CODIGO CON EL USUARIO
   $data = DB::select('(SELECT P.id_user, P.id_venta, P.fecha, P.total, C.name, C.email FROM Ventas P INNER JOIN  Users C on P.id_user = C.id)');
  */

 return view($this->path.'.index', compact('data'));
   

}
public function venta_detalle_original($id){  # Para el historico



    $data = DB::select('(SELECT P.id_venta, P.fecha, P.total, C.id_producto, C.precio_venta FROM Ventas P INNER JOIN  Ventas_detalle C on C.id_venta = '.$id.')');

  
    $data1 = DB::select('(SELECT P.id_venta, P.fecha, P.total, C.name, C.email FROM Ventas P INNER JOIN  Users C on C.id = P.id_user)');

 return view($this->path1.'.index', compact('data','data1'));
   

   /*    $data = DB::table('Ventas_detalle AS VD')
                        ->join('Ventas AS V', 'V.id_venta', '=', 'VD.id_venta')
                        ->join('products AS P', 'P.id', '=', 'VD.id_producto') 
                        ->join('Cursos AS C', 'C.id_curso', '=', 'P.id_curso')
                        ->select('VD.id_producto AS id_producto', 'VD.precio_venta AS precio_venta', 'P.id_categoria AS id_categoria', 'C.codigo AS codigo')
                        #->where('V.id_user', '=', 'V.id_venta')
                        ->where(function ($query) {
                        $query->where('V.id_user', '=', $id_user = Auth::id());
                        })
                        ->get(); 

                      */
    #$id_user = Auth::id()

    #WHERE V.id_cliente ='.$id_cliente.';
}

public function venta_detalle($id){
    

    $data = DB::select('(SELECT VD.id_producto AS id_producto, VD.precio_venta AS precio_venta, P.id_categoria AS id_categoria, C.codigo AS codigo 
                            FROM Ventas_detalle AS VD
                                    INNER JOIN  Ventas V on V.id_venta = VD.id_venta                                     INNER JOIN  products P on P.id = VD.id_producto INNER JOIN  Cursos C on C.id_curso = P.id_curso WHERE V.id_venta ='.$id.' )
        UNION 
 

        (SELECT VD.id_producto AS id_producto, VD.precio_venta AS precio_venta, P.id_categoria AS id_categoria, PA.codigo AS codigo 
                            FROM Ventas_detalle AS VD
                                    INNER JOIN  Ventas V on V.id_venta = VD.id_venta                                     INNER JOIN  products P on P.id = VD.id_producto INNER JOIN  Paquetes PA on PA.id_paquete = P.id_paquete WHERE V.id_venta ='.$id.' )

        UNION 
 

        (SELECT VD.id_producto AS id_producto, VD.precio_venta AS precio_venta, P.id_categoria AS id_categoria, PRO.codigo AS codigo 
                            FROM Ventas_detalle AS VD
                                    INNER JOIN  Ventas V on V.id_venta = VD.id_venta                                     INNER JOIN  products P on P.id = VD.id_producto INNER JOIN  Promociones PRO on PRO.id_promocion = P.id_promocion WHERE V.id_venta ='.$id.' )');

       
  
    $data1 = DB::select('(SELECT P.id_venta, P.fecha, P.total, C.name, C.email FROM Ventas P INNER JOIN  Clientes C on C.id = P.id_cliente WHERE P.id_venta ='.$id.')');

 return view($this->path1.'.index', compact('data','data1'));
   


}



}
   