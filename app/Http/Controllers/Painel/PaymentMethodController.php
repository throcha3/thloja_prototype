<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{

    public function __construct(){
        //This makes mandatory to the user to be logged in to use any of this controller's methods.
        $this->middleware('auth');
    }

    public function index()
    {
        $PaymentMethods = PaymentMethod::all();
        $total = count($PaymentMethods);
        return view('painel.paymentmethods.index', compact('PaymentMethods','total'));
    }

    public function create()
    {
        return view('painel.paymentmethods.create');
    }

    public function store(Request $request)
    {
      $dataForm = $request->all();

      $model = new PaymentMethod();
      $model->description = $dataForm['description'];

      $insert = $model->save();
      if($insert)
          return redirect()->route('paymentmethod.index');
      else
          return redirect()->back();
    }

    public function show($id)
    {
      $paymentmethod = PaymentMethod::find($id);
      
      return view('painel.paymentmethods.show', compact('paymentmethod'));
    }

    public function edit($id)
    {

      $paymentmethod = PaymentMethod::find($id);

      
      return view('painel.paymentmethods.create', compact('paymentmethod'));
    }


    public function update(Request $request, $id)
    {
      $dataForm = $request->all();

      $PaymentMethod = PaymentMethod::find($id);

      $PaymentMethod->description = $dataForm['description'];

      $update = $PaymentMethod->save();

      if ($update)
          return redirect()->route('paymentmethod.index');
      else
          return redirect()->route('paymentmethod.edit',$id)->with(['errors' => 'falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $PaymentMethod = PaymentMethod::find($id)->delete();

      if ($PaymentMethod)
          return redirect()->route('paymentmethod.index');
      else
          return redirect()->route('paymentmethod.show',$id)->with(['errors' => 'falha ao deletar']);
    }

}
