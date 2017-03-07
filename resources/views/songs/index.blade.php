@extends('layouts.main')

@section('content')
    <h1>All Songs</h1>

    <ul id="song-list">
    @foreach($songs as $song)
        <li>
            <a href="{{route('song.show', [$song->getKey()])}}">{{$song->name}}</a> ||
            <a href="{{route('song.delete', [$song->getKey()])}}" onclick="javascript:return confirm('are you sure?')">[X]</a>
        </li>
    @endforeach
    </ul>

    <p>
        <a href="{{route('song.create')}}">Add song to soundboard</a>
    </p>
@endsection