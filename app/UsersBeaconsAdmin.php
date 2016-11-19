<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class UsersBeaconsAdmin extends Model {
	use ObservantTrait;
	
    protected $table = 'users_beacons';

    public $timestamps  = false;

    protected $fillable = ['id', 'beacon_id', 'user_id'];

    public function beacons_content()
    {
        return $this->hasOne('App\BeaconsAdmin', 'id', 'beacon_id')->with('all_applet_content');
    }
}
