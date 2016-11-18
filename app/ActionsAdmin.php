<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class ActionsAdmin extends Model {
	use ObservantTrait;
	
    protected $table = 'actions';

    public $timestamps  = false;

    protected $fillable = ['id', 'action'];

}
