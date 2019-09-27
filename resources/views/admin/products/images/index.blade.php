@extends('layouts.app')

@section('title', 'Imagenes de productos')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/profile_city.jpg') }}');">

</div>
<div class="main main-raised">
  <div class="container">

    <div class="section text-center">
      <h2 class="title">imagenes de producto seleccionado</h2>
      <a href="{{ '/admin/products/create' }}" class="mx-auto mb-3 btn btn-primary btn-round"type="button" name="button">Subir nueva imagen</a>
    
        <div class="panel panel-default">
            <div class="panel-body">
                <img src="" alt="">
            </div>
        </div>
     
    </div>
  </div>
</div>
@include('includes.footer')
@endsection
