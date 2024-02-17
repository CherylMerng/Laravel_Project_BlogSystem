{{-- Day 2-3 --}}
@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 800px">

        {{-- Day 3-2 --}}
        @if (session("info"))
            <div class="alert alert-info">{{ session("info") }}</div>
        @endif

        {{-- Day 2-4 --}}
        {{ $articles->links() }}

        @foreach ($articles as $article)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>                    
                    {{-- Day 4 start --}}
                    <div class="card-subtitle mb-2">
                        <small class="text-muted">
                            {{-- Day 4-2 --}}
                            <b>Category:</b>
                            <span class="text-success">
                                {{ $article->category->name}},
                            </span>
                            {{-- Day 4-3 --}}
                            <b>Comments:</b>
                            <span class="text-primary">
                                {{ count($article->comments)}}, 
                            </span>
                            {{ $article->created_at->diffForHumans() }}
                        </small>
                    </div>
                    {{-- Day 4 end --}}
                    <div class="mb-2">{{ $article->body }}</div>

                    {{-- Day 3-1 --}}
                    {{-- view detail link - route to /articles/detail/{id} --}}
                    <a href="{{ url("/articles/detail/$article->id") }}" class="card-link">View Detail &raquo;</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

{{-- Day 2-1 --}}
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article List</title>
</head>
<body>
    
    <h1>Article List</h1>
    <ul>
        
        {{-- blade - template language | use blade instead of php --}}
        {{-- @foreach ($articles as $article) --}}
            <li>
                $article['title'] ?>
            </li>
        {{-- @endforeach --}}

    </ul>
</body>
</html>
-->
