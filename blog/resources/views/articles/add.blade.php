{{-- Day 3-4 --}}
@extends("layouts.app")
@section("content")
    <div class="container" style="max-width: 800px">

        {{-- Day 3-5 start --}}
        @if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $err)
                    {{ $err }}
                @endforeach
            </div>
        @endif
        {{-- Day 3-5 end --}}

        <form method="post">
            @csrf
            <div class="mb-2">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-2">
                <label for="">Body</label>
                <textarea class="form-control" name="body"></textarea>
            </div>
            <div class="mb-2">
                <label for="">Category</label>
                <select name="category_id" id="" class="form-select">
                    {{-- Day 4-6 show category list in add article page --}}
                    @foreach ( $categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>        
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary">Add Article</button>
        </form>
    </div>

@endsection