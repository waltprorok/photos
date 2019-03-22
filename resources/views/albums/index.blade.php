@extends('layouts.app')

@section('content')
    @if(count($albums) > 0)
        <?php
        $colcount = count($albums);
        $i = 1;
        ?>
        <div class="container">
            <div id="albums">
                <div class="row text-center">
                    @foreach($albums as $album)
                        @if($i == $colcount)
                            <div class='medium-4 columns end'>
                                <a href="/albums/{{$album->id}}">
                                    <img class="thumbnail" width="300"
                                         src="storage/album_covers/{{$album->cover_image}}"
                                         alt="{{$album->name}}">
                                </a>
                                <br>
                                <h4>{{$album->name}}</h4>
                                @else
                                    <div class='medium-4 columns'>
                                        <a href="/albums/{{$album->id}}">
                                            <img class="thumbnail" width="300"
                                                 src="storage/album_covers/{{$album->cover_image}}"
                                                 alt="{{$album->name}}">
                                        </a>
                                        <br>
                                        <h4>{{$album->name}}</h4>
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
        <div class="container">
            <div class="row text-center">
                <p>No Albums To Display</p>
            </div>
        </div>
    @endif

@endsection
