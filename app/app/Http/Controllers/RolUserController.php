<?php

namespace App\Http\Controllers;


use App\User;
use App\Roles;
use App\Rol_User;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Illuminate\Support\Facades\Input;

use Exception;

class RolUserController extends Controller
{
    private $path ='vendor.adminlte.roles-usuario';

    public function index(){

    }

    public function show($id){

        $data = DB::table('users AS U')
                    ->join('role_user AS RU', 'RU.user_id', '=', 'U.id')
                    ->join('roles AS R', 'RU.role_id','=','R.id')
                    ->select('U.id AS id_usuario','U.name AS nombre_U'
                             ,'U.email AS email_U', 'R.name AS nombre_R'
                             ,'RU.id AS id')
                    ->where('RU.user_id', '=', $id )
                    ->get();
        return view($this->path.'.show', compact('data','id'));
     }

    public function create(){

        $id = Input::get('id_usuario');

        $roles = DB::table('roles')->get();
    	return view($this->path.'.create',compact('roles','id'));
    }

	public function store(Request $request){

		try{

			$rol = new Rol_User();
            $id_role=DB::table('roles')->where('name', '=', $request->lista_id_rol)->first();
            $usuario=User::find($request->id_usuario);
            $role = Rol_User::create(['role_id'  => $id_role->id,
                                     'user_id' =>$request->id_usuario]);

        	$usuario->assignRole($id_role->name);

			return redirect()->route('roles-usuario.show',$request->id_usuario);
		}
		catch(Exception $e){

			return $e->getMessage();
		}

	}

	public function edit($id){

	}

	public function update(Request $request, $id){

	}

	public function destroy($id){

		try{
			$id_usu=DB::table('role_user')->where('id', '=', $id)->first();
			$id_usu=$id_usu->user_id;
			$rol = Rol_User::findOrFail($id);
			$rol->delete();
			return redirect()->route('roles-usuario.show',$id_usu);
		}
		catch(Exception $e){

			return $e->getMessage();

		}

	}
}
