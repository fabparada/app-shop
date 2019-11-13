@extends('layouts.app')

@section('title', 'diana')

@section('body-class', 'landing-page')

@section('styles')
  <style>
    .tt-query {
     -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    }

    .tt-hint {
      color: #999
    }

    .tt-menu {    /* used to be tt-dropdown-menu in older versions */
      width: 222px;
      margin-top: 4px;
      padding: 4px 0;
      background-color: #fff;
      border: 1px solid #ccc;
      border: 1px solid rgba(0, 0, 0, 0.2);
      -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
              border-radius: 4px;
      -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
        -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
              box-shadow: 0 5px 10px rgba(0,0,0,.2);
    }

    .tt-suggestion {
      padding: 3px 20px;
      line-height: 24px;
    }

    .tt-suggestion.tt-cursor,.tt-suggestion:hover {
      color: #fff;
      background-color: #0097cf;

    }

    .tt-suggestion p {
      margin: 0;
    }
  </style>
@endsection

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/profile_city.jpg') }}');">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title">Bienvenido a app-shop.</h1>
        <h4>Every landing page needs a small description after the big bold title, that&apos;s why we added this text here. Add here all the information that can make you or your product create the first impression.</h4>
        <br>
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
          <i class="fa fa-play"></i> Watch video
        </a>
      </div>
    </div>
  </div>
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="title">Let&apos;s talk product</h2>
          <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
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
    <div class="section text-center pb-0">
      <h2 class="title">Visita nuestras categorias</h2>
      <div class="mx-auto d-inline-block" >
        <form class="form-inline" method="get" action="{{ url('/search') }}" >
          <input id="search" type="text" placeholder="¿Que producto buscas?" class="form-control" name="query">
          <button class="btn btn-primary btn-fab btn-fab-mini btn-round mt-4" type="submit">
            <i class="material-icons">search</i>
          </button>
        
        </form>
      </div>
      

      <div class="team">
        <div class="row">
          @foreach($categories as $category)
          <div class="col-md-4">
            <div class="team-player">
              <div class="card card-plain">
                <div class="col-md-6 ml-auto mr-auto">
                  <img src="{{ $category->FeaturedImageUrl }}" alt="imagen representatica de la categoria {{ '$category->name' }}" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="card-title">
                  <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a> 
                  <br>
                  <small class="card-description text-muted">{{ $category->name }}</small>
                </h4>
                <div class="card-body">
                  <p class="card-description">{{ $category->description }}</p>
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
       
    </div>
    <div class="section section-contacts">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="text-center title">Work with us</h2>
          <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>


          <form class="contact-form">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Your Name</label>
                  <input type="email" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Your Email</label>
                  <input type="email" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
              <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
            </div>
            <div class="row">
              <div class="col-md-4 ml-auto mr-auto text-center">
                <button class="btn btn-primary btn-raised">
                  Send Message
                </button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@include('includes.footer')
@endsection

@section('scripts')
    <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>

    <script> 
      $(function () {

          var products = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.whitespace,
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          //states is an array of state names defined in "the basics"
          //local: ['hoola', 'prueba', 'prueba2','abcd']
          prefetch: '{{ url("/products/json") }}'
        });
    
        // inicializar typeahead sobre nuestro input de busqueda
        $('#search').typeahead({
          hint: true,
          highlight: true,
          minLength: 1
        }, {
              name: 'products',
              source: products
        });
      });
    </script>
@endsection