<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $data = DB::select('SELECT codigo, nombre, precio, activo, gratis,
                            ( SELECT FORMAT(Sum(precio), 2) as precio FROM Promocion_paquete PP
                            INNER JOIN Paquetes PA ON PP.id_paquete=PA.id_paquete
                            WHERE PP.activo=1 and PP.id_promocion=P.id_promocion) as total_p
                            FROM Promociones P WHERE gratis=1
        ');
         $totalclientes =  DB::select("SELECT count(*) as total FROM clientes" );

        //return view('adminlte::home');
        return view('adminlte::home',compact('data','totalclientes'));
    }
}
