<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SubCommentController extends Controller
{
    public function store(Comment $comment)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $comment->subcomments()->create([
            'comment_id' => $comment->id,
            'user_id' => 5,
            'body' => request('body')
        ]);

        return back();
    }
}
