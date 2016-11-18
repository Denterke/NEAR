<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class BeaconsAdmin extends Model {
	use ObservantTrait;
	
    protected $table = 'beacons';

    public $timestamps  = false;

    protected $fillable = ['id', 'token', 'applet_content_id'];

}
