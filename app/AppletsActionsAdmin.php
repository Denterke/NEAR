<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class AppletsActionsAdmin extends Model {
	use ObservantTrait;
	
    protected $table = 'applets_actions';

    public $timestamps  = false;

    protected $fillable = ['id', 'applet_id', 'action_id'];

    public function actions()
    {
        return $this->hasOne('App\ActionsAdmin', 'id', 'action_id');
    }
}
