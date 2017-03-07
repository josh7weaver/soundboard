{!! Form::open(['route' => ['song.store']]) !!}
    <div class="form-group">
        {{ Form::label('name', 'Song Name:') }}
        {{ Form::text('name', null, ['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('youtube_url', 'Youtube Url:') }}
        {{ Form::text('youtube_url', null, ['size'=>50, 'class'=>'form-control']) }}
    </div>

    {{ Form::submit('Save Song!', ['class'=>'btn btn-default']) }}
{!! Form::close() !!}