@extends('master')

@section('content')


        <div class="justify-center" style="width: 70px;display:flex;" >
            <img src="/bootstrap.png" class="w-75" alt="">
            <p class="text-nowrap m-3">Starter Template</p>
        </div>
        <hr class="my-8">

    @if(isset($name) && !empty($name))
    <h1>Bem vindo, {{ $name }}!</h1>

    @if(isset($timeLogged))
        <p>Você está conectado desde {{ \Carbon\Carbon::parse($timeLogged)->format('d/m/Y \à\s H:i') }}.</p>
    @else
        <p>Você acabou de logar.</p>
    @endif
            
    @else
    <h1>Bem vindo</h1>
    @endif



    <a class="btn btn-danger" href="{{ route('login.destroy', ['id' => 32]) }}">Sair</a>
    
@endsection