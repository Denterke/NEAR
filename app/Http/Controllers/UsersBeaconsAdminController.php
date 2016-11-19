<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UsersBeaconsAdmin;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class UsersBeaconsAdminController extends CrudController{

    public function all($entity){
        parent::all($entity);

        $this->filter = \DataFilter::source(new UsersBeaconsAdmin());
        $this->filter->add('user_id', 'Id пользователя', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id', 'Id');
        $this->grid->add('beacon_id', 'Id маячка');
        $this->grid->add('user_id', 'Id пользователя');

        $this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        $this->edit = \DataEdit::source(new UsersBeaconsAdmin());
        $this->edit->label('Привязка маячка к пользователю');

        $blank_beacon_option = array("" => "Выберите маячок");
        $beacons  = \App\BeaconsAdmin::pluck("token", "id")->all();
        $all_beacons_options = $blank_beacon_option + $beacons;
        $this->edit->add('beacon_id', 'Маячок', 'select')->options($all_beacons_options);

        $blank_user_option = array("" => "Выберите пользователя");
        $users   = \App\User::pluck("email", "id")->all();
        $all_users_options = $blank_user_option + $users;
        $this->edit->add('user_id', 'Действие', 'select')->options($all_users_options);
       
        return $this->returnEditView();
    }    
}
