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
                    <a href="unset_applet/{{$beacon->beacons_content->token}}"><img src="https://www.materialui.co/materialIcons/action/delete_white_192x192.png" class="applet-action-icon"></a>
                </p>
            @else
                <p class="applet-description">
                    Приложение не привязано, <b>выберите из списка</b>: {{ Form::select('beacon', $applets) }}
                    <img src="https://www.materialui.co/materialIcons/editor/mode_edit_white_192x192.png" class="applet-action-icon beacon-connect-to-applet" beacon-id="{{$beacon->beacons_content->token}}" style="cursor: pointer">
                </p>
            @endif
        </div>
    @endforeach
    </div>

    <script type="text/javascript">
        jQuery(".beacon-connect-to-applet").click(function () {
            var applet_id = $($(this).siblings()[1]).val();
            var beacon_id = $(this).attr("beacon-id");
            window.location.href = 'set_applet/'+beacon_id+'&'+applet_id;
        });
    </script>
@endsection
