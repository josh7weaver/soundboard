@extends('layouts.main')

@section('content')
    <h1>Edit "{{$song->name}}"</h1>

    {!! Form::model($song, ['route' => ['song.update', $song->getKey()], 'method' => 'put']) !!}
    <div class="form-group">
        {{ Form::label('name', 'Song Name:') }}
        {{ Form::text('name', null, ['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('youtube_url', 'Youtube Url:') }}
        {{ Form::text('youtube_url', null, ['size'=>50, 'class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('tag_input', 'Add keyword tags (for slack integration):') }}
        {{ Form::text('tag_input', $tagsCsv, ['size'=>50, 'class'=>'form-control']) }}
        <p style="font-style: italic">Separate tags with comma</p>
    </div>

    {{ Form::submit('Save Changes', ['class'=>'btn btn-default']) }}
    {!! Form::close() !!}

    <div class="space-above">
        <a href="{{route('song.index')}}"><< Back to song list</a>
    </div>
@endsection