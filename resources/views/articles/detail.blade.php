{{-- Day 3-1 --}}
@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 800px">
        <div class="card mb-2 border-primary">
            <div class="card-body">
                <h2>{{ $article->title }}</h2>
                <div>
                    <small class="text-mute">
                        {{ $article->created_at}}
                    </small>
                </div>
                <div class="mb-2" style="font-size: 1.3rem">
                    {{ $article->body }}
                </div>
                <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-outline-danger">
                    Delete
                </a>
            </div>
        </div>
    </div>
@endsection