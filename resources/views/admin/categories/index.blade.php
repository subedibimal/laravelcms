@extends('layouts.admin')

@section('content')
<h1>Categories</h1>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created</th>
        </tr>
    </thead>
    <tbody>
        @if($categories)
        @foreach($categories as $category)
        <tr>
            <th>{{$category->id}}</th>
            {{-- <th><img src="{{$category->photo_id}}? $category->photo->file : 'https://placehold.it/400x400' " alt=""></th> --}}
            {{-- <th><img height='25' width="25" src="{{$category->photo->file}}" alt="photo"></th> --}}
        {{-- <th> <a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></th> --}}
            {{-- <th>{{$category->name}}</th> --}}
        <th><a href="{{route('categories.edit', $category->id)}}">{{$category->name ? $category->name : 'Uncategorized'}}</a></th>
            <th>{{$category->created_at ? $category->created_at->diffForHumans() : 'No Date'}}</th>
        </tr>
        @endforeach
        @endif
    </tbody>
    </table>

    <h2>Create Categories:</h2>
    <form  class="form" method="post" action="/admin/categories" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Title:</label>
        <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Create Category">
            </div>
        </form>
@stop