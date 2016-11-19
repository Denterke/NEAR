@extends('layouts.app')

@section('content')
    {!! Form::open(array('url'=>'admin_panel/edit_applet','method'=>'UPDATE', 'files'=>true)) !!}
    {!! Form::token() !!}

    {!! Form::file('icon') !!}
    {!! Form::text('name', $applet[0]->name) !!}
    {!! Form::text('description', $applet[0]->description) !!}
    {!! Form::text('source_link', $applet[0]->source_link) !!}

    {!! Form::submit('Изменить') !!}
    {!! Form::close() !!}
@endsection
