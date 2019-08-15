<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Cliente;
use App\User;

use Storage;

class ClienteController extends Controller
{

    public function viewCliente()
    {
      $cliente = Cliente::all();

      $regalo = DB::select('SELECT Cu.id_curso AS id_curso,Cu.nombre AS Nombre
      FROM Promociones Pr
         INNER JOIN Promocion_paquete Pa ON Pr.id_promocion = Pa.id_promocion
         INNER JOIN Paquetes_Cursos PaC ON Pa.id_paquete = PaC.id_paquete
         INNER JOIN Cursos Cu ON Cu.id_curso = PaC.id_curso
      WHERE gratis = 1');

      return view ('cliente.home', ['cliente' => $cliente ],['regalo' => $regalo ]);
    }

    public function editarCliente (Request $request, $id)
    {
      $cliente = Cliente::findOrFail($id);

        return view('cliente.edit_cliente',[
            'cliente' => $cliente,
        ]);

    }

    public function updateCliente(Request $request, $id)
    {


      $url='';
      $file = $request->file('photo');

      $cliente = Cliente::findOrFail($id);

      if($file){
        //obtenemos el nombre del archivo
        $url = $file->getClientOriginalName();
        if (Storage::exists($cliente->photo1 ))
        {
            Storage::delete($cliente->photo1 );
        }
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('local')->put($url,  \File::get($file));
      }
      $cliente->photo1     = $url;
      $cliente->name       = $request->name;
      $cliente->last_name  = $request->last_name;
      $cliente->phone      = $request->phone;
      //$cliente->password   = bcrypt($request->password);
      $cliente->documento  = $request->documento;
      $cliente->fecha_nac  = $request->fecha_nac;

      $cliente->update();

      return redirect()->route('view.cliente');
    }
}
