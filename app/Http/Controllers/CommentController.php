<?php

namespace App\Http\Controllers;

use App\Models\Comment;     // Day 4-4
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Day 4-4
    public function delete($id) {
        $comment = Comment::find($id);
        $comment->delete();

        return back();
    }

    // Day 4-5
    public function create() {
        
    }
}
