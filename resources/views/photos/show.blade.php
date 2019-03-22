@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>{{$photo->title}}</h3>
        <p>{{$photo->description}}</p>
        <a href="/albums/{{$photo->album_id}}">Back to Gallery</a>
        <hr/>
        <div class="col-md-auto">
            <img class="rounded" style="width: 80%;" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}"
                 alt="{{$photo->title}}">
        </div>
        <br/>
        <br/>
        {!!Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete Photo', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}

        <hr/>

        <small>Size: {{$photo->size}}</small>
    </div>
@endsection
