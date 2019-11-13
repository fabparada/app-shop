@extends('layouts.app')

@section('title', 'resultados de busqueda')

@section('body-class', 'profile-page')

@section('content')

@section('styles')
  <style>
 
  </style>
@endsection

<div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/city-profile.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="/img/search.png" alt="Mostrando reasultados" class="img-raised rounded-circle img-fluid">
              </div>
              @if (session('notification'))
                <div class="alert alert-success" role="alert">
                    {{ session('notification') }}
                </div>
              @endif
              <div class="name">
                <h3 class="title">Resultados de busqueda</h3>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p> Se encontraron {{ $products->count() }} resultados para el termino {{ $query }}</p>
        </div>
        <!-- lanza el modal btn -->
        <div class="team text-center">
          <div class="row">
            @foreach($products as $product)
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <img src="{{ $product->FeaturedImageUrl }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                  </div>
                  <h4 class="card-title">
                    <a href="{{ url('/products/'.$product->id) }}">{{ $product->nombre }}</a> 
                    <br>
                    <small class="card-description text-muted">{{ $product->category->name }}</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description">{{ $product->description }}</p>
                  </div>
                  <!--<div class="card-footer justify-content-center">
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                  </div>-->
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="row">
            <div class="mx-auto">
                {{ $products->links() }}
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="row d-none">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile-tabs">
             
            </div>
          </div>
        </div>
   
    </div>
  </div>
@include('includes.footer')
<style>
html body.profile-page.login-page.sidebar-collapse.modal-open div.modal-backdrop.fade.show{
    z-index: 0 !important;
}
</style>
@endsection
