@extends('layouts.main')

@section('content')
    <h1>Rate "{{$song->name}}"</h1>

    @include('ratings.edit_form')

    <div class="space-above">
        <a href="{{route('song.index')}}"><< Back to song list</a>
    </div>
@endsection