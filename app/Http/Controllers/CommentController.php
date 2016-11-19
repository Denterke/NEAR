<?php

namespace App\Http\Controllers;

use App\CommentsAdmin;
use App\HelperClasses\Response;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        $comment = new CommentsAdmin();

        if ($comment->validate($request->input())) {

            $addComment = $comment::firstOrCreate([
                'comment' => $request->comment,
                'applet_id' => $request->applet_id
            ]);

            $addComment->save();

            return Response::postResponse200('Комментарий успешно добавлен!');
        } else {
            $errors = $comment->errors();
            return Response::getResponse400($errors);
        }
    }

    public function show($applet_id) {
        $comment = CommentsAdmin::where('applet_id', $applet_id)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return Response::getResponse200($comment);
    }
}
