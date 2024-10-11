@extends('master')

@section('content')

    <h2>Please Sign in</h2>


    @if (session()->has('success'))
        {{session()->get('success')}}
    @endif

    <form  action="{{ route('login.email') }}" method="post">
        @csrf

        <div style="width: 70px">
            <img src="/Bootstrap_roxo.png" class="w-75 pt-4" alt="">
        </div>
        
        <input type="email" class="form-control pb-2 mt-4" name="email" placeholder="Email adress">
        @error('email')
            <span>{{ $message }}</span>
        @enderror
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Login</button>
    </form>

    <p class="mt-4">© 2017-2024</p>

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
@endsection