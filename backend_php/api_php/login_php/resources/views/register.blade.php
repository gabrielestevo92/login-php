@extends('master')

@section('content')

    <a href="{{ route('home') }}">Home</a>

    <h2>{{ $email }}</h2>
    

    <form action="{{ route('login.register') }}" method="post">
    @csrf

        <div class="col-sm-10">
            <input type="text" readonly name="email" class="form-control-plaintext"  value="{{$email}}">
        </div>
        <input type="text" class="form-control pb-2 mt-4" name="name" placeholder="Name">

        <input type="text" class="form-control pb-2 mt-4" name="code" placeholder="Code">
        
        <input type="password" class="form-control pb-2 mt-4" name="password" placeholder="Password">
        @error('password')
            <span>{{ $message }}</span>
        @enderror
        <button type="submit">Register </button>
    </form>

    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('token'))
        <div>Token armazenado: {{ session('token') }}</div>
    @endif
@endsection