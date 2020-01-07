<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;

class ProductController extends Controller
{

    public function __construct(){
        //This makes mandatory to the user to be logged in to use any of this controller's methods.
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        $total = count($products);
        return view('painel.products.index', compact('products','total'));
    }

    public function create()
    {
        $subcategories = SubCategory::all();
        return view('painel.products.create', compact('subcategories'));
    }

    public function store(Request $request)
    {
        //TODO: lembrar de colocar o upload da photo
      $dataForm = $request->all();

      $model = new Product();
      $dataForm['_token'] = null;
      //$model->description = $dataForm['description'];

      
      $model->fill($dataForm);
      $model->price = str_replace(',', '.', str_replace('.', '', $model->price));  
      $model->cost_price = str_replace(',', '.', str_replace('.', '', $model->cost_price));  
      //dd($model);
      $insert = $model->save();
      if($insert)
          return redirect()->route('product.index');
      else
          return redirect()->back();
    }

    public function show($id)
    {
      $product = Product::find($id);
      
      return view('painel.products.show', compact('product'));
    }

    public function edit($id)
    {
      $product = Product::find($id);
      $subcategories = SubCategory::all();
      
      return view('painel.products.create', compact('product', 'subcategories'));
    }


    public function update(Request $request, $id)
    {
      $dataForm = $request->all();

      $Product = Product::find($id);

      $Product->description = $dataForm['description'];

      $update = $Product->save();

      if ($update)
          return redirect()->route('product.index');
      else
          return redirect()->route('product.edit',$id)->with(['errors' => 'falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $Product = Product::find($id)->delete();

      if ($Product)
          return redirect()->route('product.index');
      else
          return redirect()->route('product.show',$id)->with(['errors' => 'falha ao deletar']);
    }

    // public function itemCreate($id){
    //     $Product = Product::find($id);
    //     $zonas = Zona::all()->sortBy("nome");
    //     $zonasNaoIncluidas = array();
    //     foreach ($zonas as $z) {
    //       $vendzonaS = VendZona::where('id_Product', $Product->id)->where('id_zona', $z->id)->first();
    //       if ($vendzonaS == null) $zonasNaoIncluidas[] = $z;
    //     }
    //     $zonas = $zonasNaoIncluidas;
    //     $vendzona = VendZona::where('id_Product','=', $Product->id)->get();
    //     return view('painel.products.item', compact('Product','vendzonas','zonas'));
    // }

    // public function itemStore(Request $request){

    //     $dataForm = $request->only('id_Product',
    //                                 'id_zona'
    //                             );

    //     $insert = VendZona::create($dataForm);
    //     if($insert)
    //         return redirect()->route('Product.edit',$dataForm['id_Product']);
    //     else
    //         return redirect()->back();
    // }

    // public function itemDel($idVend, $idVendZona){
    //     $del = VendZona::find($idVendZona)->delete();
    //     if($del)
    //         return redirect()->route('Product.edit',$idVend)->with('msg','Zona excluída com sucesso');
    //     else
    //         return redirect()->route('Product.edit',$idVend)->withErrors('Erro ao excluir Zona, tente novamente');
    // }

    // public function disableHim($id){
    //     $Product = Product::find($id);
    //     if ($Product <> null){
    //         $Product->status = '0';
    //         $Product->token = "";
    //         $Product->senha = "";
    //         $Product->save();
    //         return view('painel.products.create', compact('Product','vendzona'));
    //     }
    // }
}
