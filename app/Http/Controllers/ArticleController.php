<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;    // Day 5-4 authorization logic
use App\Models\Article;
use App\Models\Category;    // Day 4-6

class ArticleController extends Controller
{
    // Day 5-1 auth
    public function __construct() {
        $this->middleware('auth')->except('index', 'detail');
    }
    
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

        // Day 5-4 authorization logic
        if (Gate::allows('delete-article', $article)) {
            $article->delete();
            return redirect("/articles")->with("info", "Article Deleted");
        }

        return back()->with("info", "Unauthorized");
    }

    // Day 3-4 start
    public function add() {
        
        // Day 4-6 show category list in add article page
        $categories = Category::all();
        return view('articles.add', [
            'categories' => $categories
        ]);
    }

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
        $article->user_id = auth()->id();   // Day 5-4 authorization logic
        $article->save();   // save Article object
        
        return redirect("/articles");
    }
    // Day 3-4 end

    // Day 4-7 start - edit article
    public function edit($id) {
        $article = Article::find($id);
        $categories = Category::all();

        return view("/articles.edit", [
            'article' => $article,
            'categories' => $categories

            // 'article' => Article::find($id),
            // 'categories' => Category::all()
        ]);
    }

    public function update($id) {

        $validator = validator(request()->all(), [
            "title" => "required",
            "body" => "required",
            "category_id" => "required",
        ]);

        $article = Article::find($id);
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();
        
        return redirect("/articles/detail/$id")->with("info", "Article Updated");
    }
    // Day 4-7 end - edit article
}
