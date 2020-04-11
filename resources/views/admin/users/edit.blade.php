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
<form  class="form" method="PUT" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
    {{csrf_field()}}
    {{-- <input type="hidden" name="_method" value="PUT"> --}}
    <div>
    <img height="100px" width="100px" src="{{$user->photo ? $user->photo->file : "https://placehold.it/400x400"}}" alt=""  class="img-responsive img-rounded">
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
    <input class="form-control" value="{{$user->name}}" type="text" name="name">
    </div>
   
    <div class="form-group">
        <label for="email">Email:</label>
    <input class="form-control" value="{{$user->email}}" type="email" name="email">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
    <input class="form-control" type="password" name="password">
    </div>
    
    <div class="form-group">
        <label for="role_id">Role:</label>
        <select name="role_id" id="role_id">
            <option>Choose Options</option>
            <option value="{{$user->role_id}}" selected="selected">{{$user->role->name}}</option>
            @foreach($roles as $role)
            
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    {{-- <input class="form-control" type="text" name="role_id"> --}}
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" id="status" name="is_active">
               @if($user->is_active == 1)
                <option value="1" selected="selected">Active</option>
                <option value="0">Not Active</option>
                @else
                <option value="1">Active</option>
                <option value="0" selected="selected">Not Active</option>
                @endif
              </select>
    {{-- <input class="form-control" type="text" name="status"> --}}
    </div>
    <div class="form-group">
    <input class="btn btn-primary" type="submit" value="Create User">
    </div>
</form>

{!!Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]])!!}
<div class="form-group">
{!!Form::submit('Delete User',['class'=>'btn btn-danger'])!!} 
</div>
{!!Form::close()!!}
@endsection