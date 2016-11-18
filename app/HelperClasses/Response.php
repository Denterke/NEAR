<?php

namespace App\HelperClasses;

use Crypt;

class Response
{
    static $SERVER_IP_ADRESS = "http://188.166.160.236/";

    public static function cropDescription($object, $length) {

        $object['description'] = mb_substr($object['description'], 0, $length).'...';
        return $object;
    }

    public static function getImagePathByAdminModel($image_path) {

        return self::$SERVER_IP_ADRESS . '/uploads/' . $image_path;
    }

    public static function getImageRoute($filename) {

        return (self::$SERVER_IP_ADRESS . '/content_image/' . Crypt::encrypt($filename));
    }


    public static function getResponse200($data) {

        return response()->json(['status' => '200', 'message' => 'Данные получены', 'object' => $data]);
    }
}

