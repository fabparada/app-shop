<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products')); //listado de productos
    }
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories')); //formulario de product
    }
    public function store(Request $request)
    {
      //validar
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
        $product = new Product();
        $product->nombre = $request->input('nombre');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;

        $product->save();

        return redirect('/admin/products');
    }
    public function edit($id)
    {
        // return "mostarr aqui form on el id $id";
        $categories = Category::orderBy('name')->get();
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product','categories')); //formulario de product
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
        $product->category_id = $request->category_id;

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
