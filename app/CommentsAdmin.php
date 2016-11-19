<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

use Illuminate\Support\Facades\Validator;

class CommentsAdmin extends Model {
	use ObservantTrait;
	
    protected $table = 'comments';

    public $timestamps  = false;

    protected $fillable = ['id', 'comment', 'applet_id'];

    private $rules = array(
        'comment' => 'required|min:5|max:500'
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
