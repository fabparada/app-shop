@extends('layouts.app')

@section('title', 'listado de productos')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/profile_city.jpg') }}');">

</div>
<div class="main main-raised">
  <div class="container">

    <div class="section text-center">
      <h2 class="title">Listado de productos</h2>
      <div class="team">
        <div class="row">
          <a href="{{ '/admin/products/create' }}" class="mx-auto mb-3 btn btn-primary btn-round"type="button" name="button">Nuevo producto</a>
          <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Categoria</th>
                    <th class="text-right">Precio</th>
                    <th class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td class="text-center">{{ $product->id}}</td>
                    <td>{{ $product->nombre}}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category ? $product->category->name : 'General' }}</td>
                    <td class="text-right">&euro; {{ $product->price }}</td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Ver producto" class="btn btn-info">
                            <i class="material-icons">person</i>
                        </button>
                        <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar" class="btn btn-success">
                            <i class="material-icons">edit</i>
                        </a>
                        <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Editar Imagenes del producto" class="btn btn-warning">
                            <i class="material-icons">satellite</i>
                        </a>
                        <form class="" action="{{ url('/admin/products/'.$product->id.'/delete')}}" method="post">
                          {{ csrf_field() }}
                          <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger">
                              <i class="material-icons">close</i>
                          </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mx-auto">{{ $products->links() }}</div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('includes.footer')
@endsection
