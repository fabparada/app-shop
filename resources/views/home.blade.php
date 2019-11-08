@extends('layouts.app')

@section('title', 'App Shop | Dashboard')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/profile_city.jpg') }}');">

</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="title">Dashboard</h2>
          @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
          @endif
          <ul class="nav nav-pills nav-pills-icons" role="tablist">
            <!--
                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
            -->
            <li class="nav-item ">
                <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                    <i class="material-icons">dashboard</i>
                    Carrito de comrpas
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                    <i class="material-icons">list</i>
                    Pedidos realizados
                </a>
            </li>
        </ul>

        
               <!-- tablainit-->
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Nombre</th>
                    <th class="text-right">Precio</th>
                    <th class="text-right">Cantidad</th>
                    <th class="text-right">subtotal</th>
                    <th class="text-right">Opciones</th>                    
                </tr>
            </thead>
            <tbody>
              @foreach (auth()->user()->cart->details as $detail)
                <tr>
                    <td class="text-center">
                      <img src="{{ $detail->product->featured_image_url }}"  height="50" alt="">
                    </td>
                    <td>
                      <a href="{{ url('/product/'.$detail->product->id) }}" target="_blank">{{ $detail->product->nombre}}</a>
                    </td>
                    <td class="text-right">$ {{ $detail->product->price }}</td>
                    <td class="text-right">$ {{ $detail->quantity }}</td>
                    <td class="text-right">$ {{ $detail->quantity * $detail->product->price }}</td>

                    <td class="td-actions text-right">
                        <a href="{{ url('/product/'.$detail->product->id) }}" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info">
                            <i class="material-icons">person</i>
                        </a>
                        <form class="" action="{{ url('/admin/products/'.$detail->product->id.'/delete')}}" method="post">
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
        <!-- tabla -->
        </div>
      </div>
      <div class="features">
        <div class="row">
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-info">
                <i class="material-icons">chat</i>
              </div>
              <h4 class="info-title">Free Chat</h4>
              <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-success">
                <i class="material-icons">verified_user</i>
              </div>
              <h4 class="info-title">Verified Users</h4>
              <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-danger">
                <i class="material-icons">fingerprint</i>
              </div>
              <h4 class="info-title">Fingerprint</h4>
              <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
@include('includes.footer')
@endsection
