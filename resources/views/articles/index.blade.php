{{-- Day 2-3 --}}
@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 800px">

        {{-- Day 2-4 --}}
        {{ $articles->links() }}

        @foreach ($articles as $article)
            <div class="card mb-2">
                <div class="card-body">
                    <h3>{{ $article->title }}</h3>
                    <div>
                        <small class="text-muted">
                            {{ $article->created_at }}
                        </small>
                    </div>
                    <div>{{ $article->body }}</div>
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
