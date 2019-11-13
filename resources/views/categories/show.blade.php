@extends('layouts.app')

@section('title', 'App Shop | Dashboard')

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
                <img src="{{ $category->featured_image_url }}" alt="imagen representativa de la categoría {{ $category->name }}" class="img-raised rounded-circle img-fluid">
              </div>

              @if (session('notification'))
                <div class="alert alert-success" role="alert">
                    {{ session('notification') }}
                </div>
              @endif


              <div class="name">
                <h3 class="title">{{ $category->name }}</h3>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p> {{ $category->description }} </p>
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
        <div class="modal fade " id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir producto al carrito de compras</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="{{ url('/cart') }}">
                {{ csrf_field() }}
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="modal-body">
                      <input type="number" name="quantity" value="1">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>
                        <button type="submit" class="btn btn-primary">añadir al carrito</button>
                      </div>
                </form>
            </div>
          </div>
        </div>   
       

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
