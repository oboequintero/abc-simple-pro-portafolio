<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

use App\Promociones;
use App\Cursos;
use App\Paquetes;

use App\Fecha_promocion;
use App\Promocion_curso;
use App\Promocion_paquete;
use App\Http\Requests;

use View;
use Redirect;

use DB;
use Illuminate\Support\Facades\Input;

class PromocionController extends Controller
{

   private $path ='vendor.adminlte.promocion';

     public function index()
     {
         $promocion = Promociones::all();

        return view($this->path.'.index', compact('promocion'));
     }


    public function lista_curso(){

        $id = Input::get('id_promocion');

        if($id!=0){
            $promo      = Promociones::findOrFail($id);
            $curso      = Cursos::all();
            $paquete    = Paquetes::all();


            /*$data = DB::select("SELECT id_pr_c as identidad,codigo,nombre,precio,PC.activo as activo FROM Promocion_curso PC
                                INNER JOIN Cursos C ON PC.id_curso = C.id_curso
                                WHERE (id_promocion=:_id1)
                                UNION
                                SELECT id_pr_pa as identidad, codigo,nombre,precio,PP.activo as activo FROM Promocion_paquete PP
                                INNER JOIN Paquetes P ON PP.id_paquete=P.id_paquete
                                WHERE (id_promocion=:_id)",['_id'=>$id,'_id1'=>$id] );*/

            $data = DB::select("SELECT id_pr_pa as identidad, codigo,nombre,FORMAT(precio, 2) as precio,PP.activo as activo FROM Promocion_paquete PP
                                INNER JOIN Paquetes P ON PP.id_paquete=P.id_paquete
                                WHERE (id_promocion=:_id)",['_id'=>$id] );
            $totalpaquetes =  DB::select("SELECT FORMAT(Sum(precio), 2) as precio FROM Promocion_paquete PP
                                        INNER JOIN Paquetes P ON PP.id_paquete=P.id_paquete
                                        WHERE PP.activo=1 and(id_promocion=:_id)",['_id'=>$id] );
                                        //dd($promo->precio);
            if ($totalpaquetes[0]->precio==0) {
                $descuento=0;
            }else {
                $descuento =  ($totalpaquetes[0]->precio-$promo->precio)/$totalpaquetes[0]->precio*100;
            }
            $descuento=number_format($descuento,2);
        }
        return view($this->path.'.lista_curso', compact('data','id','curso','paquete','promo','totalpaquetes','descuento'));
    }



    public function lista_paquete($id){

        if($id!=0){
            $data = DB::table('Promociones AS N')
                        ->join('Promocion_paquete AS E', 'E.id_promocion', '=', 'N.id_promocion')
                        ->join('Paquetes AS X', 'E.id_paquete', '=', 'X.id_paquete')
                        ->select('X.id_paquete AS id_paquete', 'E.activo AS activo', 'E.id_pr_pa AS id_pr_pa','X.codigo AS codigo','X.descripcion AS descripcion')
                        ->where('E.id_promocion', '=', $id )
                        ->get();
        }
        return view($this->path.'.lista_paquete', compact('data','id'));
    }





    public function create(){

		return view($this->path.'.create');
    }


    public function agregar_curso(){

		$id = Input::get('id_promocion');
        $curso = Cursos::all();
        return view($this->path.'.agregar_curso', compact('curso','id'));
    }

    public function agregar_paquete(){

		$id = Input::get('id_promocion');
        $paquete = Paquetes::all();
        return view($this->path.'.agregar_paquete', compact('paquete','id'));
    }



    public function buscar_p(){

        $tipo=Input::get('tipo');
        $id=Input::get('identidad');
        $id_p=Input::get('id_p');

        if ($tipo==1) {
            $promocion= DB::select('SELECT *
                                    FROM Promocion_curso AS p
                                    WHERE (p.id_curso = :_id) AND (p.id_promocion = :_idp)',
                                    ['_id'=>$id, '_idp'=>$id_p]);
            if($promocion){
               $id_tr=1;
               $id_tabla=0;
               $data=Cursos::findOrFail($id);
            }
            if(!$promocion){
               $id_tr=0;
               $id_tabla=0;
               $id_tabla = DB::table('Promocion_curso')->insertGetId(
                [
                 'id_curso' => $id,
                 'id_promocion' => $id_p,
                 'activo' => '1'
                ]
                );
               $data=Cursos::findOrFail($id);
            }
        }
        if ($tipo==2) {

            $promocion=DB::select('SELECT *
                            FROM Promocion_paquete AS p
                            WHERE (p.id_paquete = :_id) AND (p.id_promocion = :_idp)',
                            ['_id'=>$id, '_idp'=>$id_p]);

            if($promocion){

                $id_tr=1;
                $id_tabla=0;
                $data=Paquetes::findOrFail($id);
                $descuento=0;
                $total_p=0;

            }
            if(!$promocion){

                $id_tr=0;
                $id_tabla = DB::table('Promocion_paquete')->insertGetId(
					[
					 'id_paquete' => $id,
					 'id_promocion' => $id_p,
					 'activo' => '1'
					]
				);
                $data=Paquetes::findOrFail($id);

                $promo  = Promociones::findOrFail($id_p);

                $totalpaquetes =  DB::select("SELECT FORMAT(Sum(precio), 2) as precio FROM Promocion_paquete PP
                                        INNER JOIN Paquetes P ON PP.id_paquete=P.id_paquete
                                        WHERE  PP.activo = '1' and (id_promocion=:_id)",['_id'=>$id_p] );

                if ($totalpaquetes[0]->precio==0) {
                    $descuento=0;
                }else {
                    $descuento =  ($totalpaquetes[0]->precio-$promo->precio)/$totalpaquetes[0]->precio*100;
                }
                $descuento=number_format($descuento,2);
                $total_p=$totalpaquetes[0]->precio;
            }

        }
        return response()->json(array('id'=> $id_tr,'data'=>$data, 'id_tabla'=>$id_tabla,'descuento'=>$descuento,'total_p'=>$total_p ), 200);

    }


     public function store(Request $request){

           try{

                $promocion = new Promociones();
                $fecha_promocion = new Fecha_promocion();

                $id_promocion = $request->id_promocion;


            if($id_promocion!=0) # INSERT SI PROMOCION-CURSO
            {


            if ( $request->lista_id_curso != 0)
            {
                $promocion_curso = new Promocion_curso();

                $promocion_curso->id_promocion      = $id_promocion;
                $promocion_curso->id_curso   = $request->lista_id_curso;
                $promocion_curso->save();

                return redirect()->route('lista_curso',$id_promocion);
            }

            if ( $request->lista_id_paquete != 0)
            {

                $promocion_paquete = new Promocion_paquete();
                $promocion_paquete->id_promocion      = $id_promocion;
                $promocion_paquete->id_paquete   = $request->lista_id_paquete;
                $promocion_paquete->save();

                return redirect()->route('lista_paquete',$id_promocion);
            }
           }
            else # INSERT DE LA PROMOCION
            {
                $promocion->nombre        = $request->nombre;
                $promocion->codigo        = $request->codigo;
                $promocion->precio        = $request->precio;
                $promocion->descripcion   = $request->descripcion;
                $promocion->activo        = $request->activo;
                $promocion->save();

                $id_promocion=DB::table('Promociones')->where('codigo', '=', $promocion->codigo)->first();
                $id_promocion = $id_promocion->id_promocion;#BUSCANDO EL ID GENERADO AUTOINCREMENTADO DE LA PROMOCION

                $fecha_promocion->id_promocion     = $id_promocion;
                $fecha_promocion->fecha_i        = $request->fecha_i;
                $fecha_promocion->fecha_f        = $request->fecha_f;
                $fecha_promocion->save();

                return redirect()->route('promocion.index');

            }
        }
        catch(Exception $e){

            return $e->getMessage();
        }

    }


    public function editar_promocion_curso($id_promocion, $id_pr_c){
		$promocion_curso = Promocion_curso::findOrFail($id_pr_c);
		$cursos = Cursos::all();
		return view($this->path.'.edit-p-c', compact('id_promocion','promocion_curso','id_pr_c','cursos'));
	}

	public function editar_promocion_paquete($id_promocion, $id_pr_pa){
		$promocion_paquete = Promocion_paquete::findOrFail($id_pr_pa);
		$paquetes = Paquetes::all();
		return view($this->path.'.edit-p-p', compact('id_promocion','promocion_paquete','id_pr_pa','paquetes'));
	}

	public function edit($id){
		$promociones = Promociones::findOrFail($id);
		$fecha = Fecha_promocion::findOrFail($id);
		return view($this->path.'.edit', compact('promociones','id','fecha'));
	}




    public function update(Request $request, $id){
            $id_promocion = $request->id_promocion;
            if ( $request->lista_id_curso != 0)
            {
                $promocion_curso = Promocion_curso::findOrFail($id);

                $promocion_curso->activo      = $request->activo;
                $promocion_curso->id_curso   = $request->lista_id_curso;
                $promocion_curso->save();

                return redirect()->route('lista_curso',$id_promocion);
            }

            if ( $request->lista_id_paquete != 0)
            {

                $promocion_paquete =  Promocion_paquete::findOrFail($id);
                $promocion_paquete->activo      = $request->activo;
                $promocion_paquete->id_paquete   = $request->lista_id_paquete;
                $promocion_paquete->save();

                return redirect()->route('lista_paquete',$id_promocion);
            }
            else # UPDATE DE LA PROMOCION
            {

                $promocion = Promociones::findOrFail($id);
		        $fecha = Fecha_promocion::findOrFail($id);
		        $promocion->codigo	= $request->codigo;
                $promocion->nombre	= $request->nombre;
		        $promocion->descripcion 		= $request->descripcion;
		        $promocion->precio		= $request->precio;
		        $promocion->activo 		= $request->activo;
		        $promocion->save();
		        $fecha->fecha_i 		= $request->fecha_i;
		        $fecha->fecha_f 		= $request->fecha_f;
                $fecha->save();

                return redirect()->route('promocion.index');

            }

    }

    public function eliminar_promo(Request $request)
    {
        $id =Input::get('identidad');
       	return $this->destroy($id);
	}

    public function  modificar_promo(Request $request)
    {
        $id =Input::get('identidad');
        try{
            $data = Promocion_paquete::findOrFail($id);
            $id_p = $data->id_promocion;
            if ( $data->activo==0) {
                $data->activo=1;
            }else {
                $data->activo=0;
            }
            $data->save();
            $promo  = Promociones::findOrFail( $id_p);
            $totalpaquetes =  DB::select("SELECT FORMAT(Sum(precio), 2) as precio FROM Promocion_paquete PP
                                        INNER JOIN Paquetes P ON PP.id_paquete=P.id_paquete
                                        WHERE  PP.activo = '1' and (id_promocion=:_id)",['_id'=>$id_p] );

            if ($totalpaquetes[0]->precio==0) {
                $descuento=0;
            }else {
                $descuento =  ($totalpaquetes[0]->precio-$promo->precio)/$totalpaquetes[0]->precio*100;
            }
            $descuento=number_format($descuento,2);
            return response()->json(array('msg'=> $id,'datos'=> $id,'descuento'=>$descuento,'total_p'=>$totalpaquetes[0]->precio), 200);

        }
        catch(Exception $e){
            return $e->getMessage();
            return response()->json(array('msg'=> $e->getMessage(),'datos'=> $e->getMessage()), 200);
        }

    }
    public function modificar_promocion(Request $request)
    {

        $id =   Input::get('identidad');
        $promo  = Promociones::findOrFail($id);
        $promo->precio		=  Input::get('precio');
        $promo->activo 		=  Input::get('activo');
        $promo->gratis 		=  Input::get('free');
        $promo->save();
        return response()->json(array('msg'=> $id,'datos'=> $id), 200);

    }
	public function destroy($id){

		try{
            $data = Promocion_paquete::findOrFail($id);
            $id_p = $data->id_promocion;
            $data->delete();
            $promo  = Promociones::findOrFail( $id_p);
            $totalpaquetes =  DB::select("SELECT FORMAT(Sum(precio), 2) as precio FROM Promocion_paquete PP
                                        INNER JOIN Paquetes P ON PP.id_paquete=P.id_paquete
                                        WHERE   PP.activo = '1' and (id_promocion=:_id)",['_id'=>$id_p] );
            if ($totalpaquetes[0]->precio==0) {
                $descuento=0;
            }else {
                $descuento =  ($totalpaquetes[0]->precio-$promo->precio)/$totalpaquetes[0]->precio*100;
            }
            $descuento=number_format($descuento,2);
			return response()->json(array('msg'=> $id,'datos'=> $id ,'descuento'=>$descuento,'total_p'=>$totalpaquetes[0]->precio ), 200);

		}
		catch(Exception $e){
            return $e->getMessage();
            return response()->json(array('msg'=> $e->getMessage(),'datos'=> $e->getMessage()), 200);
        }


	}
}
