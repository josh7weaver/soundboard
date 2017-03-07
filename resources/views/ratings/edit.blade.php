@extends('layouts.main')

@section('content')
    <h1>Rate "{{$song->name}}"</h1>

    {!! Form::model($songRating, ['route' => ['song.rating.update', $song->getKey()]]) !!}
    <div class="form-group">
        {{ Form::label('rating', 'Rating (5 is best)') }}
        {{ Form::select('rating', $ratings, null, ['class'=>'form-control']) }}
    </div>

    {{ Form::submit('Save Rating', ['class'=>'btn btn-default']) }}
    {!! Form::close() !!}

    <div class="space-above">
        <a href="{{route('song.index')}}"><< Back to song list</a>
    </div>
@endsection