<?php 

namespace App\Http\Controllers;

use App\AppletsActionsAdmin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class AppletsActionsAdminController extends CrudController{

    public function all($entity){
        parent::all($entity);

        parent::all($entity);

        $this->filter = \DataFilter::source(new AppletsActionsAdmin());
        $this->filter->add('action', 'Действие', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id', 'Id');
        $this->grid->add('applet_id', 'Апплет');
        $this->grid->add('action_id', 'Действие');

        $this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        $this->edit = \DataEdit::source(new AppletsActionsAdmin());
        $this->edit->label('Действия апплетов');

        $blank_applet_option = array("" => "Выберите апплет");
        $applets_name   = \App\AppletContentAdmin::pluck("name", "id")->all();
        $all_applets_options = $blank_applet_option + $applets_name;
        $this->edit->add('applet_id', 'Апплет', 'select')->options($all_applets_options);

        $blank_action_option = array("" => "Выберите действие");
        $aactions_name   = \App\ActionsAdmin::pluck("action", "id")->all();
        $all_actions_options = $blank_action_option + $aactions_name;
        $this->edit->add('action_id', 'Действие', 'select')->options($all_actions_options);

        return $this->returnEditView();
    }    
}
