@extends('layouts.app')

@section('title', 'diana')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/profile_city.jpg') }}');">

</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="title">Let&apos;s talk product</h2>
          <h2 class="title">Registrar un nuevo producto</h2>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form action="{{ url('/admin/products') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-6">
              	<div class="form-group label-floating">
              		<label class="control-label">nombre del producto</label>
              		<input type="text" class="form-control" value="{{ old('nombre') }}" name="nombre">
              	</div>
              </div>
              <div class="col-sm-6">
                <div class="form-group label-floating">
                  <label class="control-label">precio producto</label>
                  <input type="number" value="{{ old('price') }}" class="form-control" name="price">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group label-floating">
                  <label class="control-label">Descripción corta</label>
                  <input type="text" value="{{ old('description') }}" class="form-control" name="description">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group label-floating">
                  <label class="control-label">categoria del producto</label>
                  <select class="form-group label-floating" name="category_id">
                    <option value="0">General</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            

            <textarea class="form-control ml-3" name="long_description" placeholder="descripcióon extensa" rows="5">{{ old('long_description') }}</textarea>
            <button class="btn btn-primary">registrar</button>
          </form>
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
