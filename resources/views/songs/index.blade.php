@extends('layouts.main')

@section('content')
    <h1>Soundboard</h1>

    <p>
        <a href="{{route('song.create')}}" class="btn btn-success">Add song to soundboard</a> &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{route('song.random')}}" class="btn btn-default">Rando!</a>
    </p>

    <table id="song-list" class="table">
        <tr>
            <th>Song Name</th>
            <th>View Count</th>
            <th>Rating (out of 5)</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
    @foreach($songs as $song)
        <tr>
            <td>
                <a href="{{route('song.show', [$song->getKey()])}}">{{$song->name}}</a>
            </td>
            <td>{{$song->view_count}}</td>
            <td>{{$song->getAvgRating()}}</td>
            <td>{{$song->created_at}}</td>
            <td>{{$song->updated_at}}</td>
            <td>
                <a href="{{route('song.rating.edit', [$song->getKey()])}}">Rate</a> |
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