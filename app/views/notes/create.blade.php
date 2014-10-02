@section('head')
    <title>Create Note</title>
@stop

@section('content')
{{ Form::open(array('action' => 'NoteController@store')) }}
    <div class="input-group markdown-form-title">
    {{ Form::text('title', null, array('placeholder' => 'Note Title', 'class' => 'form-control')) }}
    </div>
    <div class="input-group markdown-form-textarea">
    {{ Form::textarea('note', null, array('cols' => null, 'rows' => null)) }}
    </div>
    <div class="input-group markdown-form-submit">
    {{ Form::submit('Submit') }}
    </div>
{{ Form::close() }}
@stop