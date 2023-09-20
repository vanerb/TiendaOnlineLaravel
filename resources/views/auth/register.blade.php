@extends('app')

@section('title', 'Registro')

@section('meta-description', 'registro contactame ayuda')

@section('content')
<h1 class="text-center">Registro</h1> 

<div class="container">
    <form action="{{ route('register')  }}" method="POST">
        @csrf
    
        @include('auth.formfields_register')
       
        <div>
            <a href="{{ route('login') }}">Login</a>
    
            <button class="btn btn-primary" type="submit">Registrarse</button>
    </form>
</div>


@endsection

