<?php

namespace App\Http\Controllers;

use App\AppletContentAdmin;
use App\HelperClasses\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image as Image;
use File;

class AppletsContentsController extends Controller
{
    public function store(Request $request)
    {
        $applet_content = new AppletContentAdmin();

        if ($applet_content->validate($request->input())) {

            $applet_id = AppletContentAdmin::orderBy('id', 'desc')->first()->id;

            $icon = Input::file('icon');
            $destinationPath = '/applets/'.$applet_id;
            $filename = $destinationPath.'/'.$applet_id.'_icon.png';
            File::makeDirectory(public_path().$destinationPath, $mode = 0777, true, true);

            Image::make($icon->getRealPath())->save(public_path().$filename);

            $add_applet_content = $applet_content::firstOrCreate([
                'icon' => $filename,
                'name' => $request->name,
                'description' => $request->description,
                'source_link' => $request->source_link,
                'is_moderated' => false
            ]);

            $add_applet_content->save();

            return Response::postResponse200('Апплет успешно добавлен!');

        } else {
            $errors = $applet_content->errors();
            return Response::getResponse400($errors);
        }
    }
}
