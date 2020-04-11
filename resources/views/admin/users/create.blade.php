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
<form  class="form" method="post" action="/admin/users" enctype="multipart/form-data">
    {{csrf_field()}}
    {{-- <input type="hidden" name="_method" value="PUT"> --}}
    <div class="form-group">
        <label for="name">Name:</label>
    <input class="form-control" type="text" name="name">
    </div>
    <div class="form-group">
        <label for="photo_id">Image:</label>
    <input type="file" name="photo_id">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
    <input class="form-control" type="email" name="email">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
    <input class="form-control" type="password" name="password">
    </div>
    
    <div class="form-group">
        <label for="role_id">Role:</label>
        <select name="role_id" id="role_id">
            <option selected="selected" value>Choose Options</option>
            @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    {{-- <input class="form-control" type="text" name="role_id"> --}}
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" id="status" name="is_active">
                <option value="1">Active</option>
                <option value="0" selected="selected">Not Active</option>
              </select>
    {{-- <input class="form-control" type="text" name="status"> --}}
    </div>
    <div class="form-group">
    <input class="btn btn-primary" type="submit" value="Create User">
    </div>
</form>
@endsection