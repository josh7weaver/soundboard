@extends('layouts.main')

@section('content')
    <h1>All Songs</h1>

    <ul id="song-list">
    @foreach($songs as $song)
        <li>{{$song->name}}: {{$song->youtube_url}}</li>
    @endforeach
    </ul>

     <a href="{{route('song.create')}}">Add song to soundboard</a>
@endsection