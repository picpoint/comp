@extends('layouts.genlay')



@section('header')
    @parent
@endsection




@section('bodycntnt')

    <div class="section m-5">

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Почта" name="email" value="{{ @old('email') }}">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Пароль" name="password">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-5">Login</button>
        </form>
    </div>

@endsection