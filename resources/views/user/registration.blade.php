@extends('layouts.genlay')



@section('header')
    @parent
@endsection




@section('bodycntnt')

    <div class="section m-5">
        <form action="{{ route('registration.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Имя" name="name" value="{{ @old('name') }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
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
            <div class="form-group">
                <label for="password_confirmation">Confirm password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Повторите пароль" name="password_confirmation">
                @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control" id="avatar" name="avatar">
            </div>

            <button type="submit" class="btn btn-primary mt-5">Send</button>
        </form>
    </div>

@endsection