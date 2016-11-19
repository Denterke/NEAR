<?php

namespace App\Http\Controllers;

use App\HelperClasses\Response;
use App\Likes;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function like($IMEI, $applet_id) {

        $like = new Likes();

        $add_like = $like::firstOrCreate([
            'IMEI' => $IMEI,
            'applet_id' => $applet_id
        ]);

        $add_like->save();

        return Response::getResponse200('Лайк поставлен');
    }

    public function un_like($IMEI, $applet_id) {

        Likes::where('IMEI', $IMEI)
            ->where('applet_id', $applet_id)
            ->delete();

        return Response::getResponse200('Лайк удален');
    }

}
