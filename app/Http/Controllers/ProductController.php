<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products')); //listado de productos
    }
    public function create()
    {
        return view('admin.products.create'); //formulario de product
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
        $product->save();

        return redirect('/admin/products');
    }
    public function edit($id)
    {
        // return "mostarr aqui form on el id $id";
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product')); //formulario de product
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
