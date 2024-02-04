<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index() {

        // Day 2-1
        // $data = [
        //     ['title' => 'First Article'],
        //     ['title' => 'Second Article'],
        //     ['title' => 'Third Article'],
        // ];

        // Day 2-2
        // $data = Article::all();
        // Day 2-4
        $data = Article::latest()->paginate(5);

        // Day 2-1
        return view('articles.index', [
            'articles' => $data
        ]);
    }

    public function detail($id) {
        return "Article Controller Detail $id";
    }
}
