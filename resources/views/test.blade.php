@extends('master')


@section('content')

<div class="container">
    {!! Form::open(['route' => 'test_upload', 'files' => true]) !!}
        {!! Form::file('grade') !!}
        {!! Form::submit('Submit') !!}
    {!! Form::close() !!}

</div>

</body>
</html>
@stop
