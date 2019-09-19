<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Storage;
use App\ContenidoModel;
use App\Niveles;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LaminaController extends Controller
{
    private $path = "cliente";
    use AuthenticatesUsers;


//funcion para pasar a cursodash 

    public function mostrar()
    {
        $nombre=Input::get('usuario');
        $photo=Input::get('photo');
        $id_curso=Input::get('id_curso');
        $id_cliente=Input::get('id_cliente');
        $name_cliente=Input::get('name_cliente');
        $photo_cliente=Input::get('photo_cliente');

        //dd($id_curso);

            return $this->show($nombre, $photo,$id_curso, $id_cliente, $name_cliente, $photo_cliente);
    }



    public function show($n, $p, $id_curso, $id_cliente, $name_cliente, $photo_cliente)
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
                        ->orderBy('idhtml')
                        ->get();
            $parrafo=DB::table('Contenido')
                        ->where('id_plantilla', '=', $plan[0]->id_plan)
                        ->orderBy('idhtml')
                        ->get();
           //dd($parrafo);




            if (!is_null($contenido))
            {
                return view($this->path . '.CURSODASH', compact('photo_cliente', 'name_cliente', 'id_cliente', 'contenido','parrafo','plantilla','nombre','plan','photo','niveles','curso','lecciones'));
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

//fin de funcion para pasar a cursodash 






// funcion para pasar de cursodash a c1n1l1p1

public function mostrar_curso()
{
    $nombre=Input::get('name_cliente');
    $id_curso=Input::get('id_cur');
    $id_cliente=Input::get('id_cliente');
    $name_cliente=Input::get('usuario');
    $photo_cliente=Input::get('photoq');

    //dd($id_curso);

        return $this->show_curso($nombre,$id_curso,$id_cliente,$name_cliente,$photo_cliente);
}

    public function show_curso($n,$id_curso,$id_cliente,$name_cliente,$photo_cliente)
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
                        ->orderBy('idhtml')
                        ->get();
            $parrafo=DB::table('Contenido')
                        ->where('id_plantilla', '=', $plan[0]->id_plan)
                        ->orderBy('idhtml')
                        ->get();
           //dd($parrafo);

            if (!is_null($contenido))
            {
                return view($this->path . '.C1N1L1P1', compact('id_cliente','name_cliente','photo_cliente','id_curso','contenido','parrafo','plantilla','nombre','plan','niveles','curso','lecciones'));
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




// fin de funcion para pasar de cursodash a c1n1l1p1





    public function ver()
    {

        $nombre=Input::get('usuario');
        $pag   =Input::get('pagina');
        $photo_cliente =Input::get('photoq');
        $id_curso=Input::get('id_curso');

        $plan=DB::table('Plantillas')
        ->where('pagina', '=', $pag+1)
        ->get();

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
                        ->orderBy('idhtml')
                        ->get();
            $parrafo=DB::table('Contenido')
                        ->where('id_plantilla', '=', $plan[0]->id_plantilla)
                        ->orderBy('idhtml')
                        ->get();

            if (!is_null($contenido))
            {
                return view($this->path . '.C1N1L1P1', compact('id_curso','curso','niveles','lecciones','contenido','parrafo','plantilla','nombre','plan','photo_cliente'));
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



    public function cursos_gratis(){

        $regalo = DB::select('SELECT Cu.id_curso AS id_curso,Cu.nombre AS Nombre
        FROM Promociones Pr
           INNER JOIN Promocion_paquete Pa ON Pr.id_promocion = Pa.id_promocion
           INNER JOIN Paquetes_Cursos PaC ON Pa.id_paquete = PaC.id_paquete
           INNER JOIN Cursos Cu ON Cu.id_curso = PaC.id_curso
        WHERE 	gratis = 1');



        return response()->json(array('msg'=>  $regalo[0]->id_curso,'data'=> $regalo), 200);

    }
}
