{{-- Day 3-1 --}}
@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 800px">
        {{-- Day 4-7 alert box for edit article, delete comment --}}
        {{-- Day 5-4 alert box for unauthorized message --}}
        @if (session("info"))
            <div class="alert alert-info">
                {{ session("info") }}
            </div>
        @endif

        <div class="card mb-2 border-primary">
            <div class="card-body">
                <h2>{{ $article->title }}</h2>
                {{-- Day 4 start --}}
                <div class="card-subtitle mb-2">

                    {{-- Day 5-3 authentication --}}
                    <b class="text-success">
                        {{ $article->user->name }}
                    </b>,

                    <small class="text-muted">
                        {{-- Day 4-2 show category model data --}}
                        <b>Category</b>
                        <span class="text-success">
                            {{ $article->category->name}},
                        </span>
                        {{-- Day 4-3 show comment model data --}}
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
                
                {{-- Day 5-4 authorization logic in view --}}
                @can('delete-article', $article)
                    <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-outline-danger">
                        Delete
                    </a>
                @endcan

                {{-- Day 4-7 auth - edit article button --}}
                @can('edit-article', $article)
                    <a href="{{ url("/articles/edit/$article->id") }}" class="btn btn-outline-danger">
                        Edit
                    </a>    
                @endcan
                
            </div>
        </div> {{-- card --}}

        {{-- Day 4-3 show comment model data --}}
        <ul class="list-group mt-4">
            <li class="list-group-item active">
                Comments ({{ count($article->comments) }})
            </li>
            @foreach ( $article->comments as $comment )
                <li class="list-group-item">

                    {{-- Day 5-4 authorization logic in view --}}
                    @can('delete-comment', $comment)
                        {{-- Day 4-4 delete comment --}}
                        <a href="{{ url("/comments/delete/$comment->id")}}" class="btn-close float-end"></a>    
                    @endcan

                    {{-- Day 5-3 authentication --}}
                    <b>
                        {{ $comment->user->name }}
                    </b> -

                    {{-- Day 4-3 --}}
                    {{ $comment->content }}
                </li>
            @endforeach
        </ul>

        {{-- Day 5-4 authorization logic in view --}}
        @auth
            
            {{-- Day 4-5 create comment --}}
            <form action="{{ url("/comments/add") }}" method="post">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <textarea name="content" class="form-control my-2"></textarea>
                <button class="btn btn-secondary">Add Comment</button>
            </form>
        @endauth

    </div> {{-- container --}}
@endsection