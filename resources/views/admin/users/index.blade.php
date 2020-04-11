@extends('layouts.admin')

@section('content')
<div>
    @include('flash-message')
</div>
<h1>Users</h1>
<table class="table">
<thead>
    <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
    </tr>
</thead>
<tbody>
    {{-- @if($users) --}}
    @foreach($users as $user)
    <tr>
        <th>{{$user->id}}</th>
        <th><img height='25' width="25" src="{{$user->photo? $user->photo->file: '#'}}" alt="photo"></th>
    <th> <a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></th>
        <th>{{$user->email}}</th>
        <th>{{$user->role->name}}</th>
        <th>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</th>
        <th>{{$user->created_at->diffForHumans()}}</th>
        <th>{{$user->updated_at->diffForHumans()}}</th>
    </tr>
    @endforeach
    {{-- @endif --}}
</tbody>
</table>

@endsection