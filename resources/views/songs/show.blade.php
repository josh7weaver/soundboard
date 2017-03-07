@extends('layouts.main')

@section('content')
    <h1>Play Song</h1>
    <iframe id="ytplayer" type="text/html" width="640" height="360"
            src="https://www.youtube.com/embed/{{$videoId}}?autoplay=1&start={{$startTime}}"
            frameborder="0"></iframe>

    <div class="space-above">
        @include('ratings.edit_form')
    </div>

    <div class="space-above">
        <a href="{{route('song.index')}}"><< Back to song list</a>
    </div>
@endsection