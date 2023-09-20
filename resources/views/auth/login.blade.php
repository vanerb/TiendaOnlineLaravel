@extends('app')

@section('title', 'Login')

@section('meta-description', 'login logueo ayuda')

@section('content')

<div class="container">
    <h1 class="text-center">Login</h1> 

   <div>
    <form action="{{ route('login')  }}" method="POST">
        @csrf
    
        @include('auth.formfields_login')
       
        <div>
            <a  href="{{ route('register') }}">Registrarse</a>
    
            <button class="btn btn-primary" type="submit">Iniciar sesión</button>
    </form>
   </div>
</div>



@endsection

