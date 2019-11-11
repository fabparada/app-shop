@extends('layouts.app')

@section('title', 'listado de categorias')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/profile_city.jpg') }}');">

</div>
<div class="main main-raised">
  <div class="container">

    <div class="section text-center">
      <h2 class="title">Listado de categorias</h2>
      <div class="team">
        <div class="row">
          <a href="{{ '/admin/categories/create' }}" class="mx-auto mb-3 btn btn-primary btn-round"type="button" name="button">Nueva categoria</a>
          <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td class="text-center">{{ $category->id}}</td>
                    <td>{{ $category->name}}</td>
                    <td>{{ $category->description }}</td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Ver categoria" class="btn btn-info">
                            <i class="material-icons">person</i>
                        </button>
                        <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar" class="btn btn-success">
                            <i class="material-icons">edit</i>
                        </a>
                        <form class="" action="{{ url('/admin/categories/'.$category->id.'/delete')}}" method="post">
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
        <div class="mx-auto">{{ $categories->links() }}</div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('includes.footer')
@endsection
