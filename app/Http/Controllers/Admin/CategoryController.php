<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index')->with(compact('categories')); //listado de categorias
    }
    public function create()
    {
        return view('admin.categories.create'); //formulario de product
    }
    public function store(Request $request)
    {
      //validar
        $messages = [
          'name.required' => 'nombre es requerido',
          'description.required' => 'Descripción es requerida',
        ];
        $rules = [
          'name' => 'required|min:3',
          'description' => 'required|max:200',
        ];
        $this->validate($request, $rules);
        // dd($request->all());
        // registrar en la bd nueva catgegoria

        Category::create($request->all());

        return redirect('/admin/categories');
    }
    public function edit($id)
    {
        // return "mostarr aqui form on el id $id";
        $category = Category::find($id);
        return view('admin.categories.edit')->with(compact('category')); //formulario de categoria
    }
    public function update(Request $request, $id)
    {
        $messages = [
            'nombre.required' => 'nombre es requerido',
            'name.required' => 'Descripción es requerida',
        ];
        $rules = [
            'nombre' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0',
        ];
        $this->validate($request, $rules);
        // dd($request->all());
        // registrar en la bd
        $product = Product::find($id);
        $product->nombre = $request->input('nombre');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();

        return redirect('/admin/products');
    }
    public function destroy($id)
    {
        // dd($request->all());
        // registrar en la bd
        $product = Product::find($id);
        $product->delete();//delete
        return redirect('/admin/products');
    }
}
