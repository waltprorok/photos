@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Create Album</h3>
        <div class="form-group">
            {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        </div>
        <div class="form-group">
            {{Form::text('name', '', ['placeholder' => 'Album Name', 'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::textarea('description', '', ['placeholder' => 'Album Description', 'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        <div class="form-group col-md-2">
            {{Form::submit('Submit', ['class' => 'form-control btn-primary'])}}
        </div>
        <div class="form-group">
            {!! Form::close() !!}

        </div>
@endsection