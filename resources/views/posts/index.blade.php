@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Posts</h1>
    <div class="row">
        @foreach($posts as $post)
        <div class="mb-3 bg-light border rounded shadow p-3">
            <h3 class="text-primary"> {{ $post->title }} </h3>
            <p class="text-muted"> {{ $post->content }} </p>
            <p><strong class="text-secondary"> Author: </strong> {{ $post->user->name }} </p>
        </div>
        @endforeach
    </div>
</div>
@endsection
