@extends('layouts.app')

@section('title', 'Imagenes de productos')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/profile_city.jpg') }}');">

</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h2 class="title">Imagenes del producto "{{ $product->nombre }}"</h2>
      <!-- admin/products/4/images -->
      <form method="post" action="{{ route('products.save_image', $product->id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="photo" required>
        <button type="submit" class=" mb-3 btn btn-primary btn-round">Subir nueva imagen</button>
        <a href="{{ url('/admin/products' )}}" class=" mb-3 btn btn-primary btn-round">volver al listado de productos</a>
      </form>
      <hr>

      <div class="row">
        @foreach ($images as $image)

        <div class="col-md-4 mb-5">
          <div class="panel panel-default">
              <div class="panel-body">
                  <img src="{{ $image->UrlPath }}" width="250" alt="">
                  <form action="" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="image_id" value="{{ $image->id }}">
                      <button type="submit" class="btn btn-danger btn-round">Eliminar imagen</button>
                      @if($image->featured)
                        <button type="button" href=" {{url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" rel="tooltip"
                          title="Imagen destacada" class="btn btn-info btn-fab btn-fab-mini btn-round">
                          <i class="material-icons">favorite</i>
                        </button>
                      @else
                        <a href=" {{url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                          <i class="material-icons">favorite</i>
                        </a>
                      @endif

                  </form>

              </div>
          </div>
        </div>

      @endforeach
      </div>

    </div>
  </div>
</div>
@include('includes.footer')
@endsection
