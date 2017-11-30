<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Recibo;
//use pagoRecibos\app\recibo;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class aguaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$recibos=DB::table('recibo')->select('idrec','nic','fechavencimiento','montototal','total_consumido','estado','tiporecibo')->where('tiporecibo','1')->get();
        $idAuth = 1;
        $recibos = Recibo::where([
          'tipo_recibo'=> 1,
          'id_usuario' => $idAuth
        ])->get();

        //return var_dump($recibos);

        return view('agua.ListaReciboAgua',["recibos"=>$recibos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
