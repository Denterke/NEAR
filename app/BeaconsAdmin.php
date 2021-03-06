<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;
use App\AppletsActionsAdmin;

class BeaconsAdmin extends Model {
	use ObservantTrait;
	
    protected $table = 'beacons';

    public $timestamps  = false;

    protected $fillable = ['id', 'token', 'applet_content_id'];

    public function applet_content()
    {
        return $this->hasOne('App\AppletContentAdmin', 'id', 'applet_content_id')
                    ->where('is_moderated', true)
                    ->select('id', 'icon', 'name', 'description', 'source_link');
    }

    public function all_applet_content()
    {
        return $this->hasOne('App\AppletContentAdmin', 'id', 'applet_content_id');
    }

    public function likes()
    {
        return $this->hasMany('App\Likes', 'applet_id', 'applet_content_id');
    }

    public function applet_actions()
    {
        return $this->hasManyThrough(
            'App\AppletsActionsAdmin', 'App\AppletContentAdmin',
            'id', 'applet_id', 'applet_content_id'
        )
            ->with('actions');
    }

}
