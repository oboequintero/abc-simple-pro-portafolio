<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Limite_transacciones;

use App\Http\Requests;

use Exception;

class LimiteTransaccionesController extends Controller
{
    
	
	private $path ='vendor.adminlte.limite_transacciones';

    public function index(){

     	$data = Limite_transacciones::all();
    	return view($this->path.'.index', compact('data'));
    }

    public function create(){

    	return view($this->path.'.create');
    }

	
	public function store(Request $request){
		
		try{

			$data = new Limite_transacciones();
								
			$data->limite 		= $request->limite;
			$data->activo 		= $request->activo;
			$data->save();

			#return redirect()->route($this->path.'.index');

			return $this->index();
		}
		catch(Exception $e){

			return $e->getMessage();
		}

	}
	
	public function edit($id){

		$data = Limite_transacciones::findOrFail($id);
		return view($this->path.'.edit', compact('data'));


	}

	public function update(Request $request, $id){

		$data = Limite_transacciones::findOrFail($id);

		$data->limite 		= $request->limite;
		$data->activo 		= $request->activo;
		$data->save();
		return $this->index();
	}

	public function destroy($id){

		try{
			$data = Limite_transacciones::findOrFail($id);
			$data->delete();
			return $this->index();
		}
		catch(Exception $e){

			return $e->getMessage();

		}

	}
}

