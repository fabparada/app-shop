<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id')->paginate(10);
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
    public function update(Request $request, Category $category) //se hara con de otra forma con $category en vez de id como se hiso en product
    {
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
        // registrar en la bd
        //$category = Category::find($id);
        //$category->name = $request->input('name');
        //$category->description = $request->input('description');
        //$category->save();
        $category->update($request->all());

        return redirect('/admin/categories');
    }
    public function destroy(Category $category) //en vez de id usare Category $category 
    {
        // dd($request->all());
        // registrar en la bd
        //$product = Product::find($category); esta linea iria si es que pasamos como parametro el $id en la funcion destroy
        $category->delete();//delete
        return back();
    }
}
