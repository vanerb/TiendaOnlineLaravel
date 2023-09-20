@extends('app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
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

       
       
    </div>


    <div class="collapse mt-3" id="sinstock">
       
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
            </div>
            <div class="card-footer">
                <p class="text-center">{{ $products->price }} €</p>
                @auth
                <form action="{{ route('products.addcesta', ['product' => $products->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success w-100">Comprar</button>
                </form>
                @endauth
               
                
                
                
            </div>
        </div>
    </div>
    
    @endforeach
</div>
</div>


@endsection