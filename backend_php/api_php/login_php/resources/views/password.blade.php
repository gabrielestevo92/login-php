@extends('master')

@section('content')


    
    <form action="{{ route('login.store') }}" method="post">
        @csrf
        <div style="width: 70px">
            <img src="/Bootstrap_roxo.png" class="w-75 pb-4" alt="">
        </div>
        <div class="col-sm-10">
            <input type="text" readonly name="email" class="form-control-plaintext"  value="{{$email}}">
        </div>
        <input type="password" class="form-control pb-2 mt-4" name="password" placeholder="Password">
        @error('password')
            <span>{{ $message }}</span>
        @enderror
        <button type="submit" class="btn btn-primary mt-3">SignIn</button>
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