<?php 

namespace App\Http\Controllers;

use App\AppletContentAdmin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class AppletContentAdminController extends CrudController{

    public function all($entity){
        parent::all($entity);

        $this->filter = \DataFilter::source(new AppletContentAdmin());
        $this->filter->add('name', 'заголовок', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id', 'Id');
        $this->grid->add('name', 'Заголовок');
        $this->grid->add('icon', 'Ресурс изображения');
        $this->grid->add('description', 'Описание');
        $this->grid->add('source_link', 'Ссылка на источник');
        $this->grid->add('is_moderated', 'Модерация');

        $this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        $this->edit = \DataEdit::source(new AppletContentAdmin());
        $this->edit->label('Контент');
        $this->edit->add('name', 'Заголовок', 'text')->rule('required');
        $this->edit->add('icon', 'Ресурс изображения', 'text')->rule('required');
        $this->edit->add('description', 'Описание', 'textarea')->rule('required');
        $this->edit->add('source_link', 'Ссылка на источник', 'text')->rule('required');

        $this->edit->add('is_moderated', 'Модерация', 'radiogroup')
            ->option(true, 'Промодерировано')
            ->option(false, 'Не промодерировано');

        return $this->returnEditView();
    }    
}
