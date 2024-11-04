@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
    <div class="row">
        @foreach($userPosts as $post)
        <div class=" mb-3 bg-light border rounded shadow p-3">
            <h3 class="text-primary"> {{ $post->title }} </h3>
            <p class="text-muted"> {{ $post->content }} </p>
            <p><em>Posted: {{ $post->created_at }}</em></p>
            <div class="mt-2">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to update this post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
