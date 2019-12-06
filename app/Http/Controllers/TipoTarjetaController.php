<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tipo_tarjetas;

use App\Http\Requests;

use Exception;

class TipoTarjetaController extends Controller
{
    
	private $path ='vendor.adminlte.tipo_tarjeta';

    public function index(){

     	$data = Tipo_tarjetas::all();
    	return view($this->path.'.index', compact('data'));
    }

    public function create(){

    	return view($this->path.'.create');
    }

	
	public function store(Request $request){
		
		try{

			$data = new Tipo_tarjetas();
								
			$data->nombre 		= $request->nombre;
			$data->activo 		= $request->activo;
			$data->save();

			return $this->index();
		}
		catch(Exception $e){

			return $e->getMessage();
		}

	}
	
	public function edit($id){

		$data = Tipo_tarjetas::findOrFail($id);
		return view($this->path.'.edit', compact('data'));
	}

	public function update(Request $request, $id){

		$data = Tipo_tarjetas::findOrFail($id);

		$data->nombre 		= $request->nombre;
		$data->activo 		= $request->activo;
		$data->save();
		return $this->index();
	}

	public function destroy($id){

		try{
			$data = Tipo_tarjetas::findOrFail($id);
			$data->delete();
			return redirect()->route($this->path.'.index');
		}
		catch(Exception $e){

			return $e->getMessage();

		}

	}
}



