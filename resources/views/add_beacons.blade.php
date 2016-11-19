@extends('layouts.app')

@section('content')

    <div class="admin-panel-controls">
        <span class="page-title">Менеджер связей</span>
        <a href="/admin_panel" class="link-like-button align-right">Вернуться назад</a>
    </div>

    <div class="applets-list">
    @foreach ($beacons as $beacon)
        <div class="applet-item beacon-item">
            <img src="/images/ibeacon_logo.png" class="beacon-logo-li" align="left">
            <p class="applet-name">Код маяка: <b>{{$beacon->beacons_content->token}}</b></p>

            @if (isset($beacon->beacons_content->all_applet_content->name))
                <p class="applet-description">
                    Привязанное приложение: <b>{{$beacon->beacons_content->all_applet_content->name}}</b>
                    <a href="unset_applet/{{$beacon->beacons_content->token}}">Отвязать</a>
                </p>
            @else
                <p class="applet-description">
                    Приложение не привязано, <b>выберите из списка</b>: {{ Form::select('beacon', $applets) }}
                    <a href="set_applet/{{$beacon->beacons_content->token}}&1">Привязать</a>
                </p>
            @endif
        </div>
    @endforeach
    </div>
@endsection
