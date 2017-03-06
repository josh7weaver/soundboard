@extends('layouts.main')

@section('content')
    <h1>Create new song</h1>

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
@endsection