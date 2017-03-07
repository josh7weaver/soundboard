@extends('layouts.main')

@section('content')
    Play Song
    {{dump($song)}}

    <iframe id="ytplayer" type="text/html" width="640" height="360"
            src="https://www.youtube.com/embed/{{$videoId}}?autoplay=1"
            frameborder="0"></iframe>
@endsection