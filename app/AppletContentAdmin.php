<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;
use Illuminate\Support\Facades\Validator;

class AppletContentAdmin extends Model {
	use ObservantTrait;
	
    protected $table = 'applets_contents';

    public $timestamps  = false;

    protected $fillable = ['id', 'icon', 'name', 'description', 'source_link', 'is_moderated'];

    private $rules = array(
        //'icon' => 'required|mimes:jpeg,jpg,png',
        'name' => 'unique:applets_contents|required|min:3|max:50',
        'description' => 'unique:applets_contents|required|min:15|max:300',
        'source_link' => 'unique:applets_contents|required|min:5|max:300'
    );

    private $errors;

    public function validate($data)
    {
        $validator = Validator::make($data, $this->rules);

        if ($validator->fails()) {
            $this->errors = $validator->messages();
            return false;
        }

        return true;
    }

    public function errors()
    {
        return $this->errors;
    }
}
