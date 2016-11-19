@extends('layouts.app')

@section('content')

    <div class="admin-panel-controls">
        <span class="page-title">Ваши приложения</span>
        <a href="/admin_panel/add_applet" class="link-like-button align-right">Добавить приложение</a>
    </div>

    <div class="applets-list">
    @foreach ($applets as $applet)
        <div class="applet-item">
            <img src="{{ $applet->applet_content->icon}}" class="applet-icon" align="left">
            <p class="applet-name">{{ $applet->applet_content->name}}</p>
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
