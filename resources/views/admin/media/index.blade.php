@extends('layouts.admin')

@section('content')
    <h1>Media</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @if($photos)
            @foreach($photos as $photo)
            <tr>
                <th><a href="{{route('media.edit', $photo->id)}}">{{$photo->id}}</a></th>
               
                {{-- <th><img src="{{$photo->photo_id}}? $photo->photo->file : 'https://placehold.it/400x400' " alt=""></th> --}}
                {{-- <th><img height='25' width="25" src="{{$photo->photo->file}}" alt="photo"></th> --}}
            {{-- <th> <a href="{{route('photos.edit', $photo->id)}}">{{$photo->name}}</a></th> --}}
                {{-- <th>{{$photo->name}}</th> --}}
            <th><img height="50" src="{{$photo->file}}" alt="No preview"></th>
                <th>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Date'}}</th>
                <th>

                    {!!Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$photo->id]])!!}
<div class="form-group">
{!!Form::submit('Delete',['class'=>'btn btn-danger'])!!} 
</div>
{!!Form::close()!!}
                </th>
            </tr>
            @endforeach
            @endif
        </tbody>
        </table>
    
@endsection