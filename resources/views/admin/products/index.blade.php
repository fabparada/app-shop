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
                    <td class="text-center">1</td>
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
                        <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger">
                            <i class="material-icons">close</i>
                        </button>
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
<footer class="footer footer-default">
  <div class="container">
    <nav class="float-left">
      <ul>
        <li>
          <a href="https://www.creative-tim.com">
            Creative Tim
          </a>
        </li>
        <li>
          <a href="https://creative-tim.com/presentation">
            About Us
          </a>
        </li>
        <li>
          <a href="http://blog.creative-tim.com">
            Blog
          </a>
        </li>
        <li>
          <a href="https://www.creative-tim.com/license">
            Licenses
          </a>
        </li>
      </ul>
    </nav>
    <div class="copyright float-right">
      &copy;
      <script>
        document.write(new Date().getFullYear())
      </script>, made with <i class="material-icons">favorite</i> by
      <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
    </div>
  </div>
</footer>
@endsection
