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
      \Stripe\Stripe::setApiKey(env('APP_STRIPE_SECRET_KEY',''));
      $token = $req->input('stripeToken');
      $charge = \Stripe\Charge::create(array(
        "amount"=> 2000,
        "currency" => "usd",
        "description" => "example",
        "source" => $token
      ));
      return var_dump($charge);
      //return redirect('/')->with('status', $req->input('stripeToken'));
    }
}
