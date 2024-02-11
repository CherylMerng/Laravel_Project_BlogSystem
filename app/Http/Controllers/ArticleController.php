<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index() {        
        // Day 2-4
        $data = Article::latest()->paginate(5);

        // Day 2-2
        // $data = Article::all();

        // Day 2-1
        return view('articles.index', [
            'articles' => $data,
        ]);

        // Day 2-1
        // $data = [
        //     ['title' => 'First Article'],
        //     ['title' => 'Second Article'],
        //     ['title' => 'Third Article'],
        // ];
    }

    public function detail($id) {

        // Day 3-1
        $article = Article::find($id);

        return view('articles.detail', [
            'article' => $article,
        ]);

        // Day 1
        // return "Article Controller Detail $id";
    }

    // Day 3-2
    public function delete($id) {
        $article = Article::find($id);
        $article->delete();

        return redirect("/articles")->with("info", "Article Deleted");
    }

    // Day 3-4
    public function add() {
        return view('articles.add');
    }

    // Day 3-4
    public function create() {

        // Day 3-5 start
        $validator = validator(request()->all(), [
            "title" => "required",
            "body" => "required",
            "category_id" => "required",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        // Day 3-5 end

        $article = new Article;
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();   // save Article object
        
        return redirect("/articles");
    }
}
