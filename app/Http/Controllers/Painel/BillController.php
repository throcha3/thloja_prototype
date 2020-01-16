<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;

class BillController extends Controller
{

    public function __construct(){
        //This makes mandatory to the user to be logged in to use any of this controller's methods.
        $this->middleware('auth');
    }

    public function index()
    {
        $bills = Bill::all();
        $total = count($bill);
        return view('painel.bills.index', compact('bills','total'));
    }

    public function create()
    {
        return view('painel.bills.create');
    }

    public function store(Request $request)
    {
      $dataForm = $request->all();

      $model = new Bill();
      

      $insert = $model->save();
      if($insert)
          return redirect()->route('bill.index');
      else
          return redirect()->back();
    }

    public function show($id)
    {
      $bill = Bill::find($id);
      
      return view('painel.bills.show', compact('bill'));
    }

    public function edit($id)
    {

      $bill = Bill::find($id);

      
      return view('painel.bills.create', compact('bill'));
    }


    public function update(Request $request, $id)
    {
      $dataForm = $request->all();

      $bill = Bill::find($id);

      //$bill->description = $dataForm['description'];

      $update = $bill->save();

      if ($update)
          return redirect()->route('bill.index');
      else
          return redirect()->route('bill.edit',$id)->with(['errors' => 'falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $bill = Bill::find($id)->delete();

      if ($bill)
          return redirect()->route('bill.index');
      else
          return redirect()->route('bill.show',$id)->with(['errors' => 'falha ao deletar']);
    }

}
