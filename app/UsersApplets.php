<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersApplets extends Model
{
    protected $table = 'users_applets';

    public $timestamps  = false;

    protected $fillable = ['id', 'user_id', 'applet_id'];

    public function applet_content()
    {
        return $this->hasOne('App\AppletContentAdmin', 'id', 'applet_id');
    }
}
