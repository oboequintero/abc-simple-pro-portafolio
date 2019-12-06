<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Tipo_pagos;

use App\Http\Requests;

use Exception;

class TipoPagoController extends Controller

{
    
	
	private $path ='vendor.adminlte.tipo_pago';

    public function index(){

     	$data = Tipo_pagos::all();
    	return view($this->path.'.index', compact('data'));
    }

    public function create(){

    	return view($this->path.'.create');
    }

	
	public function store(Request $request){
		
		try{

			$data = new Tipo_pagos();
								
			$data->nombre 		= $request->nombre;
			$data->codigo    	= $request->codigo;
			$data->activo 		= $request->activo;
			$data->save();

			return $this->index();
		}
		catch(Exception $e){

			return $e->getMessage();
		}

	}
	
	public function edit($id){

		$data = Tipo_pagos::findOrFail($id);
		return view($this->path.'.edit', compact('data'));
	}

	public function update(Request $request, $id){

		$data = Tipo_pagos::findOrFail($id);

		$data->nombre 		= $request->nombre;
		$data->codigo	= $request->codigo;
		$data->activo 		= $request->activo;
		$data->save();
		
		return $this->index();
	}

	public function destroy($id){

		try{
			$data = Idiomas::findOrFail($id);
			$data->delete();
			return redirect()->route($this->path.'.index');
		}
		catch(Exception $e){

			return $e->getMessage();

		}

	}
}


