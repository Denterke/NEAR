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
}
