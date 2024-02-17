{{-- Day 3-1 --}}
@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 800px">
        <div class="card mb-2 border-primary">
            <div class="card-body">
                <h2>{{ $article->title }}</h2>
                {{-- Day 4 start --}}
                <div class="card-subtitle mb-2">
                    <small class="text-muted">
                        {{-- Day 4-2 --}}
                        <b>Category</b>
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
                <div class="mb-2" style="font-size: 1.3rem">
                    {{ $article->body }}
                </div>
                <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-outline-danger">
                    Delete
                </a>
            </div>
        </div> {{-- card --}}

        {{-- Day 4-3 --}}
        <ul class="list-group mt-4">
            <li class="list-group-item active">
                Comments ({{ count($article->comments) }})
            </li>
            @foreach ( $article->comments as $comment )
                <li class="list-group-item">

                    {{-- Day 4-4 --}}
                    <a href="{{ url("/comments/delete/$comment->id")}}" class="btn-close float-end"></a>

                    {{-- Day 4-3 --}}
                    {{ $comment->content }}
                </li>
            @endforeach
        </ul>

    </div> {{-- container --}}
@endsection