<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct(){
        //This makes mandatory to the user to be logged in to use any of this controller's methods.
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        $total = count($categories);
        return view('painel.categories.index', compact('categories','total'));
    }

    public function create()
    {
        return view('painel.categories.create');
    }

    public function store(Request $request)
    {
      $dataForm = $request->all();

      $model = new Category();
      $model->description = $dataForm['description'];

      $insert = $model->save();
      if($insert)
          return redirect()->route('category.index');
      else
          return redirect()->back();
    }

    public function show($id)
    {
      $category = Category::find($id);
      
      return view('painel.categories.show', compact('category'));
    }

    public function edit($id)
    {

      $category = Category::find($id);

      
      return view('painel.categories.create', compact('category'));
    }


    public function update(Request $request, $id)
    {
      $dataForm = $request->all();

      $Category = Category::find($id);

      $Category->description = $dataForm['description'];

      $update = $Category->save();

      if ($update)
          return redirect()->route('category.index');
      else
          return redirect()->route('category.edit',$id)->with(['errors' => 'falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $Category = Category::find($id)->delete();

      if ($Category)
          return redirect()->route('category.index');
      else
          return redirect()->route('category.show',$id)->with(['errors' => 'falha ao deletar']);
    }

    // public function itemCreate($id){
    //     $Category = Category::find($id);
    //     $zonas = Zona::all()->sortBy("nome");
    //     $zonasNaoIncluidas = array();
    //     foreach ($zonas as $z) {
    //       $vendzonaS = VendZona::where('id_Category', $Category->id)->where('id_zona', $z->id)->first();
    //       if ($vendzonaS == null) $zonasNaoIncluidas[] = $z;
    //     }
    //     $zonas = $zonasNaoIncluidas;
    //     $vendzona = VendZona::where('id_Category','=', $Category->id)->get();
    //     return view('painel.categories.item', compact('Category','vendzonas','zonas'));
    // }

    // public function itemStore(Request $request){

    //     $dataForm = $request->only('id_Category',
    //                                 'id_zona'
    //                             );

    //     $insert = VendZona::create($dataForm);
    //     if($insert)
    //         return redirect()->route('Category.edit',$dataForm['id_Category']);
    //     else
    //         return redirect()->back();
    // }

    // public function itemDel($idVend, $idVendZona){
    //     $del = VendZona::find($idVendZona)->delete();
    //     if($del)
    //         return redirect()->route('Category.edit',$idVend)->with('msg','Zona excluída com sucesso');
    //     else
    //         return redirect()->route('Category.edit',$idVend)->withErrors('Erro ao excluir Zona, tente novamente');
    // }

    // public function disableHim($id){
    //     $Category = Category::find($id);
    //     if ($Category <> null){
    //         $Category->status = '0';
    //         $Category->token = "";
    //         $Category->senha = "";
    //         $Category->save();
    //         return view('painel.categories.create', compact('Category','vendzona'));
    //     }
    // }
}
