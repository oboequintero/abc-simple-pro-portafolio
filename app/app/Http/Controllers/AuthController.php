<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;


use View;
use Redirect;
use Exception;


class AuthController extends Controller {

    private $path ='vendor.adminlte.auth';

    public function show($id){

        $data = User::all();
        return view($this->path . '.show', compact('data'));
   }

    public function create(){

       return view($this->path . '.create');

    }

    public function edit($id){

		$user = User::findOrFail($id);
		return view($this->path .'.edit', compact('user'));
    }


    public function update(Request $request, $id){

		$User = User::findOrFail($id);

		$User->name 		= $request->nombre;
        $User->email 		= $request->email;
        $User->password 	= Hash::make($request->password);
        $User->save();

	 return view('home');
    }


    public function store(Request $request){

		try{

			$User = new User();

			$User->name 		= $request->nombre;
			$User->email 		= $request->email;
			$User->password 	= Hash::make($request->password);
			$User->save();

			return redirect()->route('auth.show',0);
		}
		catch(Exception $e){

			return $e->getMessage();
		}

	}




    public function showLogin()
    {
        // Verificamos si hay sesión activa
        if (Auth::check())
        {
            // Si tenemos sesión activa mostrará la página de inicio
            return Redirect::to('/');
        }
        // Si no hay sesión activa mostramos el formulario
        return View::make('login');
    }

    public function postLogin()
    {

        // Obtenemos los datos del formulario
        $data = [
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ];

        // Verificamos los datos
        if (Auth::attempt($data, Input::get('remember'))) // Como segundo parámetro pasámos el checkbox para sabes si queremos recordar la contraseña
        {
            // Si nuestros datos son correctos mostramos la página de inicio
            return Redirect::intended('/');
        }
        // Si los datos no son los correctos volvemos al login y mostramos un error
        return Redirect::back()->with('error_message', 'Datos Invalidos')->withInput();
    }

    public function logOut()
    {
        // Cerramos la sesión
        Auth::logout();
        // Volvemos al login y mostramos un mensaje indicando que se cerró la sesión
        return Redirect::to('login')->with('error_message', 'Salida correcta del Sistema');
    }

}
