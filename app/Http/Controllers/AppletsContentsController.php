<?php

namespace App\Http\Controllers;

use App\AppletContentAdmin;
use App\HelperClasses\Response;
use App\UsersApplets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image as Image;
use File;

class AppletsContentsController extends Controller
{
    public function index() {

        $applets = UsersApplets::where('user_id', Auth::id())
            ->with('applet_content')
            ->get();

        return view('admin_panel', ['applets' => $applets]);
    }

    public function store(Request $request)
    {
        $applet_content = new AppletContentAdmin();
        $user_applet    = new UsersApplets();

        if ($applet_content->validate($request->input())) {

            $add_applet_content = $applet_content::firstOrCreate([
                'icon' => 'defualt.png',
                'name' => $request->name,
                'description' => $request->description,
                'source_link' => $request->source_link,
                'is_moderated' => false
            ]);

            $add_applet_content->save();

            $applet_id = AppletContentAdmin::orderBy('id', 'desc')->first()->id;

            $icon = Input::file('icon');
            $destinationPath = '/applets/'.$applet_id;
            $filename = $destinationPath.'/'.$applet_id.'_icon.png';
            File::makeDirectory(public_path().$destinationPath, $mode = 0777, true, true);

            Image::make($icon->getRealPath())->save(public_path().$filename);

            AppletContentAdmin::where('id', $applet_id)
                ->update(array('icon' => $filename));

            $add_user_applet = $user_applet::firstOrCreate([
                'user_id' => Auth::id(),
                'applet_id' => $applet_id
            ]);

            $add_user_applet->save();

            return Response::postResponse200('Апплет успешно добавлен!');

        } else {
            $errors = $applet_content->errors();
            return Response::getResponse400($errors);
        }
    }
}
