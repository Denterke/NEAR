@extends('layouts.app')

@section('content')

    <div class="admin-panel-controls">
        <span class="page-title">Добавить приложение</span>
        <a href="/admin_panel" class="link-like-button align-right">Вернуться назад</a>
    </div>

    <div class="applets-list dashed-top">
        <div class="beacon-logo"></div>

        {!! Form::open(array('url'=>'admin_panel/edit_applet','method'=>'UPDATE', 'files'=>true)) !!}

        <p class="field-title">Заголовок</p>
        {!! Form::text('name', $applet[0]->name, ["placeholder" => 'Заголовок']) !!}
        <p class="field-title">Описание</p>
        {!! Form::textarea('description', $applet[0]->description, ["placeholder" => 'Описание']) !!}
        <p class="field-title">Ссылка на источник</p>
        {!! Form::text('source_link', $applet[0]->source_link, ["placeholder" => "Ссылка на источник"]) !!}
        <p class="field-title">Иконка приложения</p>
        {!! Form::file('icon') !!}

        {!! Form::submit('Отправить изменения на модерацию') !!}
        {!! Form::close() !!}
    </div>

@endsection
