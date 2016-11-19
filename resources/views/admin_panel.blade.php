@extends('layouts.app')

@section('content')
    <p>
        <a href="admin_panel/add_applet">Добавить новый апплет</a>
    </p>
    @foreach ($applets as $applet)
        <p>
            {{ $applet->applet_content->name}} {{ $applet->applet_content->description}}
            <a href="admin_panel/edit_applet/{{$applet->applet_content->id}}">Редактировать апплет</a>
            <a href="admin_panel/show_beacons">Привязать маячки</a>
        </p>
    @endforeach
@endsection
