@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Posts</h1>
    <div class="row">
        @foreach($posts as $post)
        <div class="mb-3 bg-light border rounded shadow p-3">
            <h3 class="text-primary"> {{ $post->title }} </h3>
            <p class="text-muted"> {{ $post->content }} </p>
            <p><strong class="text-secondary"> Author: </strong>
            @if(Auth::id() == $post->user_id)
                <span>Me</span>
            @else
             {{ $post->user->name }} 
            @endif
            </p>
            <p><em>Posted: {{ $post->created_at }}</em></p>
        </div>
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
