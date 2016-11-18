<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class AppletContentAdmin extends Model {
	use ObservantTrait;
	
    protected $table = 'applets_contents';

    public $timestamps  = false;

    protected $fillable = ['id', 'icon', 'name', 'description', 'source_link', 'is_moderated'];

    public function applet_actions()
    {
        return $this->hasMany('App\AppletsActionsAdmin', 'applet_id', 'id');
    }

}
