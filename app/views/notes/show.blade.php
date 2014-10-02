@section('head')
    <title>{{{ $note['title'] }}}</title>
@stop

@section('content')
    <div class="page-header note-title">
        <h1>{{{ $note['title'] }}}</h1>
    </div>
    
    <div class="note-body well">
        {{ $note['note'] }}
    </div>
@stop