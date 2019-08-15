<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Cliente;
use DB;
use App\User;


class Controller extends BaseController
{
    private $path = "cliente";

   

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function viewIndex()
    {
      return view ('index');
    }

    public function viewTienda()
    {
      return view ('tienda');
    }

    public function viewQuienes()
    {
      return view ('quienessomos');
    }

    public function viewDiferente()
    {
      return view ('diferente');
    }

    public function viewGaleria()
    {
      return view ('galeria');
    }
    
    public function viewHome()
    {
      return view ('cliente.home');
    }

  public function mostrarQuienes()
  { $id=Input::get('id');
    $nombre=Input::get('user');
    return view($this->path . '.quienes', compact('nombre', 'id'));
  }

  public function mostrarDiferente()
  { $id=Input::get('id');
    $nombre=Input::get('user');
    return view($this->path . '.diferente', compact('nombre', 'id'));
  }

  public function mostrarTienda()
  { $id=Input::get('id');
    $nombre=Input::get('user');
    return view($this->path . '.tienda', compact('nombre', 'id'));
  }

  public function mostrarGaleria()
  { $id=Input::get('id');
    $nombre=Input::get('user');
    return view($this->path . '.galeria', compact('nombre', 'id'));
  }
}
