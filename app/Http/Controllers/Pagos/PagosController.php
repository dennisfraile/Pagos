<?php

namespace App\Http\Controllers\Pagos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Recibo;
use App\Modelos\Factura;

class PagosController extends Controller
{



  public function __construct()
  {
      $this->middleware('auth');
  }

    public function show($id)
    {
      //Return form.

      return view('pagos.create',['recibo' =>Recibo::find($id)]);
    }

    public function create(Request $req)
    {
      \Stripe\Stripe::setApiKey(env('APP_STRIPE_SECRET_KEY',''));
      //$token = $req->input('stripeToken');

      try {
        $charge = \Stripe\Charge::create(array(
          "amount"=> $req->input('monto')*100,
          "currency" => "usd",
          "description" => $req->input('descripcion'),
          "source" => $req->input('stripeToken')
        ));
        $recibo = Recibo::find($req->input('id'));
        $recibo->estado=1;
        $recibo->save();
        $factura = new Factura();
        $factura->total_cancelado = $req->input('monto');
        $factura->descripcion = $req->input('descripcion');
        $factura->id_usuario = $recibo->id_usuario;
        $factura->fecha = date("m/d/y");
        $factura->save();
        //SWITCH

        return redirect('/facturas')->with('status', 'Pago por '. $charge['description'] . ' efectuado.');
      } catch (\Stripe\Error\Card $e) {
        $body = $e->getJsonBody();
        $err = $body['error'];

        return rediret('/charges')->with('status', 'Codigo: ' . $err['code'] . ' ' . $err['message']);
      }


    }

}
