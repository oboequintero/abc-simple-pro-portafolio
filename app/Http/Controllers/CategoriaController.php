<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categorias;

use View;
use Redirect;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use DB;

use Storage;






class CategoriaController extends Controller
{

    private $path ='vendor.adminlte.categoria';
    #private $path ='cliente.categoria';


    public function index(){

        $categorias = Categorias::all();
        #return view('categoria.index')->with('categorias', $categorias);
        #return view($this->path.'.index', compact('categorias'));
        $cliente = Auth::id(); 

        return view($this->path . ".index", compact('categorias','cliente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    	//

	}


}

