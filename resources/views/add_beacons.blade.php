@extends('layouts.app')

@section('content')
    @foreach ($beacons as $beacon)
        <p>
            {{$beacon->beacons_content->token}}

            @if (isset($beacon->beacons_content->all_applet_content->name))
                {{$beacon->beacons_content->all_applet_content->name}}
                <a href="unset_applet/{{$beacon->beacons_content->token}}">Отвязать апплет</a>
            @else
                {{ Form::select('beacon', $applets) }}
                <a href="set_applet/{{$beacon->beacons_content->token}}&1">Привязать маячки</a>
            @endif
        </p>
    @endforeach
@endsection
