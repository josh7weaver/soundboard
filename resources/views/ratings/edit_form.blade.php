{!! Form::model($songRating, ['route' => ['song.rating.update', $song->getKey()]]) !!}
<div class="form-group">
    {{ Form::label('rating', 'Rating') }}
    {{ Form::select('rating', $ratings, null, ['class'=>'form-control']) }}
</div>

{{ Form::submit('Save Rating', ['class'=>'btn btn-default']) }}
{!! Form::close() !!}