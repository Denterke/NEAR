@extends('layouts.app')

@section('content')

    <div class="admin-panel-controls">
        <span class="page-title">Ваши приложения</span>
        <div class="align-right">
            <a href="/admin_panel/add_applet" class="link-like-button">Добавить приложение</a>
            &nbsp;&nbsp;&nbsp;
            <a href="/admin_panel/add_applet" class="link-like-button">Настройка маяков</a>
        </div>
    </div>

    <div class="applets-list">
    @foreach ($applets as $applet)
        <div class="applet-item">
            <img src="{{ $applet->applet_content->icon}}" class="applet-icon" align="left">
            <p class="applet-name">{{$applet->applet_content->name}} {!!($applet->applet_content->is_moderated) ? '<img src="http://kvadroom-service.ru/wp-content/uploads/2016/07/%D0%B3%D0%B0%D0%BB%D0%BE%D1%87%D0%BA%D0%B0.png" class="applet-action-icon">' : '<img src="http://www.mixagram.com/images/496f8085.loading-big.gif" class="applet-action-icon">'!!}</p>
            <p class="applet-description">{{ $applet->applet_content->description}}</p>
            <div class="applet-actions">
                <a href="/admin_panel/edit_applet/{{$applet->applet_content->id}}">
                    <img src="https://www.materialui.co/materialIcons/editor/mode_edit_white_192x192.png" class="applet-action-icon">
                </a>
                <a href="/admin_panel/edit_applet/{{$applet->applet_content->id}}">
                    <img src="https://www.materialui.co/materialIcons/social/notifications_white_192x192.png" class="applet-action-icon">
                </a>
                <a href="/admin_panel/edit_applet/{{$applet->applet_content->id}}">
                    <img src="https://www.materialui.co/materialIcons/action/delete_white_192x192.png" class="applet-action-icon">
                </a>
            </div>
        </div>
    @endforeach

        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/Happy-outline.svg/2000px-Happy-outline.svg.png"
            style="width: 20%; filter: invert(100%); -webkit-filter: invert(100%); opacity: 0.1;">

    </div>
@endsection
