@extends('layouts.main')

@section('content')
    <h1>Create new song</h1>
    <p>
        <i>
            Note:<br />
            Load the song you want in youtube, move it to the desired start time and right click on the movie.<br />
            Select "copy video URL at current time" - paste that url into the Youtube url field.
        </i>

    </p>

    @include('songs._form', ['song' => null])

    <div class="space-above">
        <a href="{{route('song.index')}}"><< Back to song list</a>
    </div>
@endsection