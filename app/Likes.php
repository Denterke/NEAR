<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = 'likes';

    public $timestamps  = false;

    protected $fillable = ['id', 'IMEI', 'applet_id'];
}
