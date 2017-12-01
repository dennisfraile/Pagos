<?php

namespace App\Http\Controllers\Facturas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Factura;
use Illuminate\Support\Facades\Auth;

class FacturasController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $idAuth = Auth::id();
    return view('factura.list',[
      'facturas' => Factura::where('id_usuario',$idAuth)->get()
    ]);
  }

}
