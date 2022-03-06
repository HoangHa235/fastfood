<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function postcomment(Request $request, $id)
    {
        $comment = new Comment;
        $comment->recuit_id = $request->recruit_id;
        $comment->user_id = $request->user_id;
        $comment->content = $request->content;
        $comment->active = 1;
        $comment->save();
        return back();
    }
}
