<?php

namespace App\Http\Controllers\Facturas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Factura;

class FacturasController extends Controller
{

  public function index()
  {
    $idAuth = 1;
    return view('factura.list',[
      'facturas' => Factura::where('id_usuario',$idAuth)->get()
    ]);
  }

}
