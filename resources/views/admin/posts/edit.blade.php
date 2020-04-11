@extends('layouts.admin')

@section('content')
<h1>Edit Posts</h1>

<div>
<img height="50" src="{{$post->photo->file}}" alt="">
</div>

@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
            @endforeach
        </ul>
</div>
@endif
{{-- action="{{url('admin/users')}}" --}}
<form  class="form" method="PUT" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
    {{csrf_field()}}
    {{-- @method('put') --}}
    <div class="form-group">
        <label for="title">Title:</label>
    <input class="form-control" value="{{$post->title}}" type="text" name="title">
    </div>
    <div class="form-group">
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id">
            <option selected="selected" value>Choose</option>
            @foreach($categories as $category)
        <option value="{{$category->category_id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="photo_id">Image:</label>
    <input type="file" value="{{$post->photo->name}}" name="photo_id">
    </div>
    <div class="form-group">
        <label for="body">Description:</label>
    <textarea class="form-control" type="text" name="body">{{$post->body}}</textarea>
    </div>
    <div class="form-group">
    <input class="btn btn-primary" type="submit" value="Create Post">
    </div>
</form>

{!!Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]])!!}
<div class="form-group">
{!!Form::submit('Delete Post',['class'=>'btn btn-danger'])!!} 
</div>
{!!Form::close()!!}
@endsection