@extends('layouts.admin')

@section('content')
<h1>Create Users</h1>

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
<form  class="form" method="post" action="/admin/posts" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">Title:</label>
    <input class="form-control" type="text" name="title">
    </div>
    <div class="form-group">
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id">
            <option selected="selected" value>Choose</option>
            @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="photo_id">Image:</label>
    <input type="file" name="photo_id">
    </div>
    <div class="form-group">
        <label for="body">Description:</label>
    <textarea class="form-control" type="text" name="body"></textarea>
    </div>
    <div class="form-group">
    <input class="btn btn-primary" type="submit" value="Create Post">
    </div>
</form>
@endsection