<?php

namespace App\Http\Controllers;

use App\Models\bankdeposit;
use App\Models\bankrequest;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexrequest()
    {
        return view('modules/bank/bankrequest');
    }

    public function storerequest(Request $request)
    {
        //dump($request);
        $bankrequest = new bankrequest;
        $bankrequest->fromdate = $request->input('fromdate');
        $bankrequest->todate = $request->input('todate');
        $bankrequest->weeknumber = $request->input('week');
        $bankrequest->cash1 = $request->input('cash1');
        $bankrequest->cash5 = $request->input('cash5');
        $bankrequest->roll0_01 = $request->input('cash0-01');
        $bankrequest->roll0_05 = $request->input('cash0-05');
        $bankrequest->roll0_10 = $request->input('cash0-10');
        $bankrequest->roll0_25 = $request->input('cash0-25');
        $bankrequest->roll0_50 = $request->input('cash0-50');
        $bankrequest->roll1_00 = $request->input('cash1-00');
        $bankrequest->file_img = json_encode($request->input('archivosimg'));
        $bankrequest->save();

        //Mensaje para confirmación de guardado.
        $request->session()->flash('mensaje', 'El formulario de solicitud ha sido guardado correctamente.');
        return view('modules/bank/bankrequest');
    }

    public function indexdeposit()
    {
        return view('modules/bank/bankdeposit');
    }

    public function storedeposit(Request $request)
    {
        //dump($request);
        //dump($request->input('fecha'));
        //dump($request->input('banco'));
        //dump($request->input('efectivo'));
        //dump(json_encode($request->input('archivosimg')));
        $bankdeposit        = new bankdeposit;
        $bankdeposit->dates = $request->input('fecha');
        $bankdeposit->banks = $request->input('banco');
        $bankdeposit->cash  = $request->input('efectivo');
        $bankdeposit->save();

        //Mensaje para confirmación de guardado.
        $request->session()->flash('mensaje', 'El formulario de deposito ha sido guardado correctamente');
        return view('modules/bank/bankdeposit');
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
