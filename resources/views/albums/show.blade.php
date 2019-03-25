@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$album->name}}</h1>
        <a class="btn btn-default" href="/">Go Back</a>
        <a class="btn btn-primary" href="/photos/create/{{$album->id}}">Upload Photo To Album</a>
        <hr/>

        @if(count($album->photos) > 0)
            <?php
            $colcount = count($album->photos);
            $i = 1;
            ?>
            <div id="photos">
                <div class="row">
                    @foreach($album->photos as $photo)
                        @if($i == $colcount)
                            <div class='col-md-6'>
                                <a href="/photos/{{$photo->id}}">
                                    <img class="rounded text-center" style="width:100%"
                                         src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}"
                                         alt="{{$photo->title}}">
                                </a>
                                <br>
                                <h4 class="text-center">{{$photo->title}}</h4>
                                @else
                                    <div class='col-md-6'>
                                        <a href="/photos/{{$photo->id}}">
                                            <img class="rounded text-center" style="width:100%"
                                                 src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}"
                                                 alt="{{$photo->title}}">
                                        </a>
                                        <br>
                                        <h4 class="text-center">{{$photo->title}}</h4>
                                        @endif
                                        @if($i % 3 == 0)
                                    </div></div>
                            <div class="row text-center">
                                @else
                            </div>
                        @endif
                        <?php $i++; ?>
                    @endforeach
                </div>
            </div>
    </div>
    @else
        <div class="row text-center">
            <p>No Photos To Display</p>
        </div>
    @endif

@endsection