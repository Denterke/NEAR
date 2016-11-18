<?php 

namespace App\Http\Controllers;

use App\BeaconsAdmin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class BeaconsAdminController extends CrudController{

    public function all($entity){
        parent::all($entity);

        $this->filter = \DataFilter::source(new BeaconsAdmin());
        $this->filter->add('token', 'Токен', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id', 'Id');
        $this->grid->add('token', 'Токен');
        $this->grid->add('applet_content_id', 'Привязанный контент');
        $this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        $this->edit = \DataEdit::source(new BeaconsAdmin());
        $this->edit->label('Маячки');
        $this->edit->add('token', 'Токен', 'text')->rule('required');
        $this->edit->add('applet_content_id', 'Привязанный контент', 'number');
       
        return $this->returnEditView();
    }    
}
