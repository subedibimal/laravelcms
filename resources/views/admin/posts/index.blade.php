@extends('layouts.admin')

@section('content')
<h1>Posts</h1>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Author</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>
        @if($posts)
        @foreach($posts as $post)
        <tr>
            <th>{{$post->id}}</th>
            <th><img height="50" src="{{$post->photo_id? $post->photo->file : 'https://placehold.it/400x400'}} " alt=""></th>
            {{-- <th><img height='25' width="25" src="{{$post->photo->file}}" alt="photo"></th> --}}
        {{-- <th> <a href="{{route('posts.edit', $post->id)}}">{{$post->name}}</a></th> --}}
            <th>{{$post->user->name}}</th>
            <th>{{$post->category_id ? $post->category->name : 'Uncategorized'}}</th>
        <th><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></th>
            <th>{{$post->body}}</th>
            <th>{{$post->created_at}}</th>
            <th>{{$post->updated_at}}</th>
            <th><a href="{{route('home.post', $post->id)}}">View Post</a></th>
            <th><a href="{{route('comments.show', $post->id)}}">View Comments</a></th>
            {{-- ->diffForHumans() --}}
        </tr>
        @endforeach
        @endif
    </tbody>
    </table>
@endsection