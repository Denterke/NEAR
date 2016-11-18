<?php 

namespace App\Http\Controllers;

use App\ActionsAdmin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class ActionsAdminController extends CrudController{

    public function all($entity){
        parent::all($entity);

        $this->filter = \DataFilter::source(new ActionsAdmin());
        $this->filter->add('action', 'Действие', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id', 'Id');
        $this->grid->add('action', 'Действие');

        $this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        $this->edit = \DataEdit::source(new ActionsAdmin());
        $this->edit->label('Действия');
        $this->edit->add('action', 'Действие', 'text')->rule('required');
       
        return $this->returnEditView();
    }    
}
