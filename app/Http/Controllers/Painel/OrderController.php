<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use App\Models\PaymentMethod;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{

    public function __construct(){
        //This makes mandatory to the user to be logged in to use any of this controller's methods.
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::all();
        $total = count($orders);
        return view('painel.orders.index', compact('orders','total'));
    }

    public function create()
    {
        $customers = Customer::all();
        $paymentmethods = PaymentMethod::all();

        return view('painel.orders.create', compact('customers', 'paymentmethods'));
    }

    public function store(Request $request)
    {
      $dataForm = $request->all();

      $model = new Order();
      $dataForm['_token'] = null;
      $model->fill($dataForm);

      $insert = $model->save();
      if($insert)
          return redirect()->route('order.index');
      else
          return redirect()->back();
    }

    public function show($id)
    {
      $order = Order::find($id);
      
      return view('painel.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $customers = Customer::all();
        $paymentmethods = PaymentMethod::all();
        $order = Order::find($id);
        $orderItems = OrderItem::where('order_id', '=', $id)->get();
        
        return view('painel.orders.create', compact('order','customers', 'paymentmethods', 'orderItems'));
    }


    public function update(Request $request, $id)
    {
      $dataForm = $request->all();

      $order = Order::find($id);

      $order->description = $dataForm['description'];

      $update = $order->save();

      if ($update)
          return redirect()->route('order.index');
      else
          return redirect()->route('order.edit',$id)->with(['errors' => 'falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $order = Order::find($id)->delete();

      if ($order)
          return redirect()->route('order.index');
      else
          return redirect()->route('order.show',$id)->with(['errors' => 'falha ao deletar']);
    }

    public function itemCreate($id)
    {
        $products = Product::all();
        $customers = Customer::all();
        $paymentmethods = PaymentMethod::all();

      $order = Order::find($id);
      $orderItems = OrderItem::where('order_id','=', $order->id)->get();

    //dd($orderItems);
      return view('painel.orders.item', compact('order','orderItems', 'customers', 'paymentmethods', 'products'));
    }

    public function itemStore(Request $request)
    {
      $dataForm = $request->all();
      $model = new OrderItem();
      $dataForm['_token'] = null;
 
      // Verificar condição pra caso o usuario não digite nada nos campos de qtde e valores,
      // Seja preenchido automaticamente com o valor padrão do cadastro do produto e qtde 1
      // Assim como calcular o preço total automatico
      if ($dataForm['price'] == null) {
          $prod = Product::find($dataForm['product_id']);
          $dataForm['price']  = $prod->price;
      }
      else 
        $dataForm['price']  = str_replace(',', '.', str_replace('.', '', $dataForm['price'] ));  
      if ($dataForm['amount']  == null) 
        $dataForm['amount'] = 1;

      $dataForm['total_price'] = $dataForm['amount'] * $dataForm['price'];

      //Inserir valores já tratados no model
      $model->amount      = $dataForm['amount'];
      $model->price       = $dataForm['price'];
      $model->total_price = $dataForm['total_price'];
      $model->product_id  = $dataForm['product_id'];
      $model->order_id    = $dataForm['id'];

      $insert = $model->save();
      if($insert)
          return redirect()->route('order.edit', $dataForm['id']);
      else
          return redirect()->back()->with(['errors' => 'falha ao salvar item do pedido']);;
    }

}
