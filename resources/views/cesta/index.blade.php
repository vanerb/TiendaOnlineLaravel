@extends('app')

@section('content')

<div class="container">
    @foreach ($product as $products)
    <div class="card mt-4">
        <div class="row">
            
            <div class="col-md-6">
                <h1>{{ $products->name }}</h1>
            </div>
            <div class="col-md-10">
                <p>{{ $products->price }}</p>
            </div>
            <div class="col-md-2">
                <form action="{{ route('cesta.destroy', ['cestum' => $products->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Eliminar</button>
                </form>
            </div>
            
        </div>
    </div>
    @endforeach

</div>

@endsection