@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Upload Photo</h3>
        <div class="form-group">
            {!! Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        </div>
        <div class="form-group">
            {{Form::text('title', '', ['placeholder' => 'Photo Title', 'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::textarea('description', '', ['placeholder' => 'Photo Description', 'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::hidden('album_id', $album_id)}}
        </div>
        <div class="form-group">
            {{Form::file('photo')}}
        </div>
        <div class="form-group col-md-2">
            {{Form::submit('Submit', ['class' => 'form-control btn-primary'])}}
        </div>
        <div class="form-group">
            {!! Form::close() !!}
        </div>
    </div>
@endsection