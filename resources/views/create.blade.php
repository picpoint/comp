@extends('layouts.genlay')



@section('header')
    @parent
@endsection




@section('bodycntnt')

    <div class="container">
        <form method="post" class="mt-5" action="{{ route('posts.store') }}">
            @csrf

            {{--@if($errors->any())--}}
                {{--<div class="alert alert-danger">--}}
                    {{--<ul>--}}
                        {{--@foreach($errors->all() as $error)--}}
                            {{--<li>{{ $error }}</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--@endif--}}

            {{--@if(session('succes'))--}}
                {{--<div class="alert alert-success">--}}
                    {{--{{ session('succes') }}--}}
                {{--</div>--}}
            {{--@endif--}}

            <div class="form-group">
                <label for="hdr">Header</label>
                <input type="text" class="form-control @error('hdr') is-invalid @enderror" id="hdr" placeholder="header" name="hdr" value="{{ @old('hdr') }}">
                @error('hdr')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cntnt">Content</label>
                <textarea class="form-control @error('cntnt') is-invalid @enderror" id="cntnt" rows="5" name="cntnt">{{ @old('cntnt') }}</textarea>
                @error('cntnt')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="rubric_id">Rubric</label>
                <select class="form-control @error('rubric_id') is-invalid @enderror" id="rubric_id" name="rubric_id">
                    <option>Select anywhere rubric</option>
                    @foreach($rubrics as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('rubric_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-5">Create post</button>

        </form>
    </div>


@endsection



