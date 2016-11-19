<?php 

namespace App\Http\Controllers;

use App\CommentsAdmin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class CommentsAdminController extends CrudController{

    public function all($entity){
        parent::all($entity);

        $this->filter = \DataFilter::source(new CommentsAdmin());
        $this->filter->add('comment', 'Комментарий', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id', 'Id');
        $this->grid->add('comment', 'Комментарий');
        $this->grid->add('applet_id', 'Привязанный апплет');
        $this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        $this->edit = \DataEdit::source(new CommentsAdmin());
        $this->edit->label('Комментарии');

        return $this->returnEditView();
    }    
}
