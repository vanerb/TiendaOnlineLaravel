@extends('app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-10">
            @if (session('success'))
            <h6 class="m-2 alert alert-success">{{ session('success') }}</h6>
        @endif
      
        @error('name')
        <h6 class="m-2 alert alert-danger">{{ $message }}</h6>
        @enderror
      
        @error('description')
        <h6 class="m-2 alert alert-danger">{{ $message }}</h6>
        @enderror
      
        @error('image')
        <h6 class="m-2 alert alert-danger">{{ $message }}</h6>
        @enderror
      
        @error('price')
        <h6 class="m-2 alert alert-danger">{{ $message }}</h6>
        @enderror
      
        @error('stock')
        <h6 class="m-2 alert alert-danger">{{ $message }}</h6>
        @enderror
        </div>

        <div class="col-md-2">
            <div>
                
                    <button type="button" class="btn btn-success float-end mt-2" data-bs-toggle="modal" data-bs-target="#newProduct">
                        Nuevo
                      </button>
              
                
            </div>
            
        </div>
       
    </div>


<!-- Modal -->
<div class="modal fade" id="newProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            @csrf
    
          

            <div class="mb-3">
            <label class="form-label" for="name">Nombre</label>
            <input class="form-control" type="text" name="name" id="name">
            </div>

            <div class="mb-3">
            <label class="form-label" for="description">Descripcion</label>
            <input class="form-control" type="text" name="description" id="description">
            </div>

            <div class="mb-3">
            <label class="form-label" for="image">Imagen</label>
            <input class="form-control" type="file" accept="image/*" name="image">
            </div>

            <div class="mb-3">
            <label class="form-label" for="price">Precio</label>
            <input class="form-control" type="number" step="0.01" name="price" id="price">
            </div>

            <div class="mb-3">
            <label class="form-label" for="stock">Stock</label>
            <input class="form-control" type="number" name="stock" id="stock">
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>



    <div class="row">


        @foreach ($product as $products)
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-title">
                    <h1 class="text-center">{{ $products->name }}</h1>
                </div>
                <div class="card-body text-center">
                    <img class="mx-auto rounded-circle" src="{{ asset('storage/' . $products->image) }}" alt="" width="300" height="300">
                    <p class="text-center">{{ $products->description }}</p>
                    <p>Stock: {{ $products->stock }}</p>
                </div>
                <div class="card-footer">
                    <p class="text-center">{{ $products->price }} €</p>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="float-end w-100" href="{{ route('products.show', ['product' => $products->id]) }}"><button class="btn btn-primary w-100">Editar</button></a>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('products.destroy', ['product' => $products->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger w-100">Eliminar</button>
                              </form>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>
        </div>
        
        @endforeach
    </div>
</div>


@endsection