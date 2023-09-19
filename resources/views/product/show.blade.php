@extends('app')

@section('content')


<div class="container">
    @if (session('success'))
    <h6 class="alert alert-success">{{ session('success') }}</h6>
@endif

@error('name')
<h6 class="alert alert-danger">{{ $message }}</h6>
@enderror

@error('description')
<h6 class="alert alert-danger">{{ $message }}</h6>
@enderror

@error('image')
<h6 class="alert alert-danger">{{ $message }}</h6>
@enderror

@error('price')
<h6 class="alert alert-danger">{{ $message }}</h6>
@enderror

@error('stock')
<h6 class="alert alert-danger">{{ $message }}</h6>
@enderror


<form enctype="multipart/form-data" method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
    @method('PATCH')

    @csrf

  

    <div class="mb-3">
    <label class="form-label" for="name">Nombre</label>
    <input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}">
    </div>

    <div class="mb-3">
    <label class="form-label" for="description">Descripcion</label>
    <input class="form-control" type="text" name="description" id="description" value="{{ $product->description }}">
    </div>

    <div class="mb-3">
    <label class="form-label" for="image">Imagen</label>
    <input class="form-control" type="file" name="image" id="image">
    </div>

    <div class="mb-3">
    <label class="form-label" for="price">Precio</label>
    <input class="form-control" type="number" step="0.01" name="price" id="price" value="{{ $product->price }}">
    </div>

    <div class="mb-3">
    <label class="form-label" for="stock">Stock</label>
    <input class="form-control" type="number" name="stock" id="stock" value="{{ $product->stock }}">
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>

</form>


</div>








@endsection