<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function create(Request $req)
    {
      // $compra = 2550;
      // \Stripe\Stripe::setApiKey(env('APP_STRIPE_SECRET_KEY',''));
      // $resp = \Stripe\Token::create(array(
      // "card" => array(
      //   "number" => "4242424242424242",
      //   "exp_month" => 11,
      //   "exp_year" => 2018,
      //   "cvc" => "314"
      //   )
      // ));
      // try {
      //   $pago = \Stripe\Charge::create(array(
      //     "amount" => $compra,
      //     "currency" => "usd",
      //     "source"=> $resp['id']
      //   ));
      //
      //   return redirect('/')->with('status', $pago['paid']);
      //
      //   //return redirect('/');
      // } catch (\Stripe\Error\Card $e) {
      //   $body = $e->getJsonBody();
      //   $err = $body['error'];
      //   //session(['error',$err['message']]);
      //   return redirect('/')->with('status', $err['message']);
      // }
      //return var_dump($req);
      return redirect('/')->with('status', $req->input('stripeToken'));
    }
}
