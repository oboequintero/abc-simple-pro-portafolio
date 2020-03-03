<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\auditoria_cliente;
use App\ContenidoModel;
use App\Niveles;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Exception;

class LaminaController extends Controller
{
    private $path = "cliente";
    use AuthenticatesUsers;

    public function show($n, $p,$id_curso,$porce)
    {

       $nombre=$n;
       $photo=$p;
        try
        {

            $plan = DB::select('SELECT id_plantilla AS id_plan, pagina AS pagina
                 FROM Plantillas Pl
                    INNER JOIN  Lecciones Le On Pl.id_leccion = Le.id_leccion
                    INNER JOIN  Niveles Ni ON Le.id_nivel = Ni.id_nivel
                    INNER JOIN  Cursos Cu ON Ni.id_curso = Cu.id_curso
                 WHERE pagina=1');


            $curso=DB::table('Cursos')
                        ->where('id_curso', '=', $id_curso)
                        ->get();
            $niveles=DB::table('Niveles')
                        ->where('id_curso', '=', $id_curso)
                        ->get();
            $lecciones=DB::table('Lecciones')
                        ->where('id_nivel', '=', $niveles[0]->id_nivel)
                        ->get();
            $plantilla=DB::table('Plantillas')
                        ->where('id_plantilla', '=', $plan[0]->id_plan)
                        ->get();
            $contenido=DB::table('Contenido')
                        ->where('id_plantilla', '=',$plan[0]->id_plan)
                        ->where('activo','=',1)
                        ->orderBy('idhtml')
                        ->get();
            $parrafo=DB::table('Contenido')
                        ->where('id_plantilla', '=', $plan[0]->id_plan)
                        ->orderBy('idhtml')
                        ->get();
           //dd($parrafo);

            if (!is_null($contenido))
            {
                return view($this->path . '.CURSODASH', compact('contenido','parrafo','plantilla','nombre','plan','photo','niveles','curso','lecciones','porce'));
            }
            else
            {
                return response('Data no existe.', 404);
            }
        }
        catch(exception $e)
        {
            return $e->getMessage();
        }
    }

    public function mostrar()
    {

        $id_curso=Input::get('id_curso');
        $id_cliente=Input::get('id_cliente');
        $cliente=DB::table('clientes')
        ->where('id', '=', $id_cliente)
        ->get();

        $total_curso = DB::select(' SELECT
                                       COUNT(*) as total
                                    FROM
                                        Cursos C
                                        INNER JOIN Niveles N ON C.id_curso = N.id_curso
                                        INNER JOIN Lecciones L ON N.id_nivel = L.id_nivel
                                        INNER JOIN Plantillas P ON P.id_leccion = L.id_leccion
                                    WHERE
                                        C.id_curso = :id_curso',["id_curso"=>$id_curso]);
        $auditoria = DB::select('   SELECT porcentaje
                                    FROM auditoria_cliente
                                    WHERE idcliente = :id_cli',["id_cli"=>$id_cliente]);

        if($auditoria){

            $porce=$auditoria[0]->porcentaje;

        }else{

            $audi = new auditoria_cliente;

            $audi->idcliente = $id_cliente;
            $audi->idcurso = $id_curso;
            $audi->porcentaje = 0;

            $audi->save();

            dd($total_curso);
        }

            return $this->show($cliente[0]->name, $cliente[0]->photo1,$id_curso,$porce);
    }


    public function show_curso($n,$id_curso)
    {

       $nombre=$n;

        try
        {

            $plan = DB::select('SELECT id_plantilla AS id_plan, pagina AS pagina
                 FROM Plantillas Pl
                    INNER JOIN  Lecciones Le On Pl.id_leccion = Le.id_leccion
                    INNER JOIN  Niveles Ni ON Le.id_nivel = Ni.id_nivel
                    INNER JOIN  Cursos Cu ON Ni.id_curso = Cu.id_curso
                 WHERE pagina=1');


            $curso=DB::table('Cursos')
                        ->where('id_curso', '=', $id_curso)
                        ->get();
            $niveles=DB::table('Niveles')
                        ->where('id_curso', '=', $id_curso)
                        ->get();
            $lecciones=DB::table('Lecciones')
                        ->where('id_nivel', '=', $niveles[0]->id_nivel)
                        ->get();
            $plantilla=DB::table('Plantillas')
                        ->where('id_plantilla', '=', $plan[0]->id_plan)
                        ->get();
            $contenido=DB::table('Contenido')
                        ->where('id_plantilla', '=',$plan[0]->id_plan)
                        ->where('activo','=',1)
                        ->orderBy('idhtml')
                        ->get();

            $parrafo=DB::table('Contenido')
                        ->where('id_plantilla', '=', $plan[0]->id_plan)

                        ->orderBy('idhtml')
                        ->get();
           //dd($parrafo);

            if (!is_null($contenido))
            {
                return view($this->path . '.C1N1L1P1', compact('id_curso','contenido','parrafo','plantilla','nombre','plan','photo','niveles','curso','lecciones'));
            }
            else
            {
                return response('Data no existe.', 404);
            }
        }
        catch(exception $e)
        {
            return $e->getMessage();
        }
    }

    public function mostrar_curso()
    {
        $nombre=Input::get('usuario');

        $id_curso=Input::get('id_cur');

        //dd($id_curso);

            return $this->show_curso($nombre,$id_curso);
    }

    public function ver()
    {

        $nombre=Input::get('usuario');
        $pag   =Input::get('pagina');
        $photo =Input::get('photo');
        $id_curso=Input::get('id_curso');

        $plan=[];
        $plan=DB::table('Plantillas')
        ->where('pagina', '=', $pag+1)
        ->get();

        if(empty($plan[0])){
            //dd(empty($plan[0]));
            return view($this->path . '.EXERCISE', compact('id_curso','curso','niveles','lecciones','contenido','parrafo','plantilla','nombre','plan','photo'));
        }
        else{
            try
            {
                $curso=DB::table('Cursos')
                        ->where('id_curso', '=', $id_curso)
                        ->get();
                $niveles=DB::table('Niveles')
                        ->where('id_curso', '=', $id_curso)
                        ->get();
                $lecciones=DB::table('Lecciones')
                        ->where('id_nivel', '=', $niveles[0]->id_nivel)
                        ->get();
                $plantilla=DB::table('Plantillas')
                            ->where('id_plantilla', '=', $plan[0]->id_plantilla)
                            ->get();
                $contenido=DB::table('Contenido')
                            ->where('id_plantilla', '=', $plan[0]->id_plantilla)
                            ->where('activo','=',1)
                            ->orderBy('idhtml')
                            ->get();
                $parrafo=DB::table('Contenido')
                            ->where('id_plantilla', '=', $plan[0]->id_plantilla)
                            ->where('activo','=',1)
                            ->orderBy('idhtml')
                            ->get();

                if (!is_null($contenido))
                {
                    return view($this->path . '.C1N1L1P1', compact('id_curso','curso','niveles','lecciones','contenido','parrafo','plantilla','nombre','plan','photo'));
                }
                else
                {
                    return response('Data no existe.', 404);
                }
            }
            catch(exception $e)
            {
                return $e->getMessage();
            }




        }


    }
    public function cursos_gratis(){

        $regalo = DB::select('SELECT Cu.id_curso AS id_curso,Cu.nombre AS Nombre
        FROM Promociones Pr
           INNER JOIN Promocion_paquete Pa ON Pr.id_promocion = Pa.id_promocion
           INNER JOIN Paquetes_Cursos PaC ON Pa.id_paquete = PaC.id_paquete
           INNER JOIN Cursos Cu ON Cu.id_curso = PaC.id_curso
        WHERE 	gratis = 1');
        return response()->json(array('msg'=>  $regalo[0]->id_curso,'data'=> $regalo), 200);

    }

    public function log_cliente(){

        $regalo = Input::get('identidad');

        $curso=DB::table('clientes')
                   ->where('id', '=', $regalo)
                   ->get();
        if($curso[0]->login == 0){

            DB::INSERT('INSERT INTO Log_cliente(id_cliente, estatus)
            VALUE(:id_cliente,:estatus)',
               [
                 'id_cliente'=>$regalo,
                 'estatus'   =>'1'
               ]
            );
            DB::UPDATE('UPDATE clientes SET login = 1 WHERE id = :id_cliente',
               ['id_cliente'=>$regalo ]
            );
        }
        return response()->json(array('msg'=>  $regalo,'data'=> $regalo), 200);
    }
}
