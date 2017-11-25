<?php

namespace App\Http\Controllers\Pagos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagosController extends Controller
{

    public function show()
    {
      //Return form.
      return view('pagos.create');
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
        return redirect('/charges')->with('status', 'Pago por '. $charge['description'] . ' efectuado.');
      } catch (\Stripe\Error\Card $e) {
        $body = $e->getJsonBody();
        $err = $body['error'];

        return rediret('/charges')->with('status', 'Codigo: ' . $err['code'] . ' ' . $err['message']);
      }


    }

}
