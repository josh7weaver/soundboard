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

    {!! Form::open(['route' => ['song.store']]) !!}
        <div class="form-group">
            {{ Form::label('name', 'Song Name:') }}
            {{ Form::text('name') }}
        </div>
        <div class="form-group">
            {{ Form::label('youtube_url', 'Youtube Url:') }}
            {{ Form::text('youtube_url', null, ['size'=>50]) }}
        </div>

        {{ Form::submit('Save Song!') }}
    {!! Form::close() !!}

    <div>
        <a href="{{route('song.index')}}">Back to song list</a>
    </div>
@endsection