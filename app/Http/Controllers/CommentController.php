<?php

namespace App\Http\Controllers;

use App\Models\Comment;     // Day 4-4
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;    // Day 5-4 authorization logic

class CommentController extends Controller
{
    // Day 5-1 auth
    public function __construct() {
        $this->middleware('auth');
    }

    // Day 4-4 delete comment
    public function delete($id) {
        $comment = Comment::find($id);

        // Day 5-4 authorization logic
        if (Gate::allows('delete-comment', $comment)) {
            $comment->delete();
            return back()->with("info", "Comment Deleted");
        }

        return back()->with("info", "Unauthorized");
        
    }

    // Day 4-5 create comment
    public function create(Request $request) {
        $request->validate([   // request object
            "content" => "required",
            "article_id" => "required",
        ]);

        $comment = new Comment;
        $comment->content = $request->content;
        $comment->article_id = $request->article_id;
        $comment->user_id = auth()->id();   // Day 5-4 authorization logic
        $comment->save();

        return back();
    }

    // $validator = validator(request()->all(), [
    //     "title" => "required",
    //     "body" => "required",
    //     "category_id" => "required",
    // ]);

    // if ($validator->fails()) {
    //     return back()->withErrors($validator);
    // }

    // $article = new Article;
    // $article->title = request()->title;
    // $article->body = request()->body;
    // $article->category_id = request()->category_id;
    // $article->save();   // save Article object
    
    // return redirect("/articles");
}
