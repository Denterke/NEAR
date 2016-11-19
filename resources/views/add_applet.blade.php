@extends('layouts.app')

@section('content')
    {!! Form::open(array('url'=>'admin_panel/store_applet','method'=>'POST', 'files'=>true)) !!}
    {!! Form::token() !!}

    {!! Form::file('icon') !!}
    {!! Form::text('name', 'Заголовок') !!}
    {!! Form::text('description', 'Описание') !!}
    {!! Form::text('source_link', 'Ссылка на источник') !!}

    {!! Form::submit('Добавить') !!}
    {!! Form::close() !!}
@endsection
