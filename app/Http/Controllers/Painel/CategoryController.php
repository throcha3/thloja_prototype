<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;

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
      $subcategories = SubCategory::where('category_id','=', $category->id)->get();

    //dd($subcategories);
      return view('painel.categories.create', compact('category','subcategories'));
    }


    public function update(Request $request, $id)
    {
      $dataForm = $request->all();

      $category = Category::find($id);

      $category->description = $dataForm['description'];

      $update = $category->save();

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
      $category = Category::find($id)->delete();

      if ($category)
          return redirect()->route('category.index');
      else
          return redirect()->route('category.show',$id)->with(['errors' => 'falha ao deletar']);
    }

    public function subCreate($id)
    {
      $category = Category::find($id);
      $subcategories = SubCategory::where('category_id','=', $category->id)->get();

    //dd($subcategories);
      return view('painel.categories.item', compact('category','subcategories'));
    }

    public function subStore(Request $request)
    {
      $dataForm = $request->all();

      $model = new SubCategory();
      $model->description = $dataForm['description'];
      $model->category_id = $dataForm['cat_id'];

      $insert = $model->save();
      if($insert)
          return redirect()->route('category.edit', $dataForm['cat_id']);
      else
          return redirect()->back()->with(['errors' => 'falha ao salvar subcategoria']);;
    }
    
}
