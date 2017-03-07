@extends('layouts.main')

@section('content')
    <h1>Soundboard</h1>

    <p>
        <a href="{{route('song.create')}}" class="btn btn-success">Add song to soundboard</a>
    </p>

    <table id="song-list" class="table">
        <tr>
            <th>Song Name</th>
            <th>View Count</th>
            <th>Rating (out of 5)</th>
            <th>Actions</th>
        </tr>
    @foreach($songs as $song)
        <tr>
            <td>
                <a href="{{route('song.show', [$song->getKey()])}}">{{$song->name}}</a>
            </td>
            <td>{{$song->view_count}}</td>
            <td>5</td>
            <td>
                <a href="{{route('song.edit', [$song->getKey()])}}">Edit</a> |
                <a href="{{route('song.delete', [$song->getKey()])}}" onclick="javascript:return confirm('are you sure?')">Delete</a>
            </td>
        </tr>
    @endforeach
    </table>

    <p>
        <a href="{{route('song.create')}}" class="btn btn-success">Add song to soundboard</a>
    </p>
@endsection