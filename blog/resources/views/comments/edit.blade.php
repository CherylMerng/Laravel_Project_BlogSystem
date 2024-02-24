{{-- edit article --}}
@extends("layouts.app")
@section("content")
    <div class="container" style="max-width: 800px">

        @if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $err)
                    {{ $err }}
                @endforeach
            </div>
        @endif

        <form method="post">
            @csrf
            <textarea name="content" class="form-control my-2">{{ $comment->content }}</textarea>    
            <button class="btn btn-primary">Update Comment</button>
        </form>
    </div>

@endsection