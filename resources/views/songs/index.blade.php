@extends('layouts.main')

@section('content')
    <h1>All Songs</h1>
    @foreach($songs as $song)
        {{dump($song)}}
    @endforeach
@endsection