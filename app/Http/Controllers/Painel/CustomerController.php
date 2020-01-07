<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{

    public function __construct(){
        //This makes mandatory to the user to be logged in to use any of this controller's methods.
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::all();
        $total = count($customers);
        return view('painel.customers.index', compact('customers','total'));
    }

    public function create()
    {
        return view('painel.customers.create');
    }

    public function store(Request $request)
    {
      $dataForm = $request->all();

      $model = new Customer();
      $model->description = $dataForm['description'];

      $insert = $model->save();
      if($insert)
          return redirect()->route('customer.index');
      else
          return redirect()->back();
    }

    public function show($id)
    {
      $customer = Customer::find($id);
      
      return view('painel.customers.show', compact('customer'));
    }

    public function edit($id)
    {

      $customer = Customer::find($id);

      
      return view('painel.customers.create', compact('customer'));
    }


    public function update(Request $request, $id)
    {
      $dataForm = $request->all();

      $customer = Customer::find($id);

      $customer->description = $dataForm['description'];

      $update = $customer->save();

      if ($update)
          return redirect()->route('customer.index');
      else
          return redirect()->route('customer.edit',$id)->with(['errors' => 'falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $customer = Customer::find($id)->delete();

      if ($customer)
          return redirect()->route('customer.index');
      else
          return redirect()->route('customer.show',$id)->with(['errors' => 'falha ao deletar']);
    }

}
