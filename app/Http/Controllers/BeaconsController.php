<?php

namespace App\Http\Controllers;

use App\BeaconsAdmin;
use App\HelperClasses\Response;
use Illuminate\Http\Request;

class BeaconsController extends Controller
{
    public function show($token)
    {
        $applet_info = BeaconsAdmin::where('token', $token)
            ->with('applet_content')
            ->with('applet_actions')
            ->get();

        return Response::getResponse200($applet_info);
    }

    public function set_applet($beacon_token, $applet_id) {

        BeaconsAdmin::where('token', $beacon_token)
            ->update(array('applet_content_id' => $applet_id));

        return redirect()->action('AppletsContentsController@show_beacons');
    }

    public function unset_applet($beacon_token) {

        BeaconsAdmin::where('token', $beacon_token)
            ->update(array('applet_content_id' => null));

        return redirect()->action('AppletsContentsController@show_beacons');
    }
}
