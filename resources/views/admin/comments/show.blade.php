@extends('layouts.admin')

@section('content')
@if(count($comments) > 0)

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Created</th>
                {{-- <th>Updated</th> --}}
            </tr>
        </thead>
        
        <tbody>
            @foreach($comments as $comment)
            <tr>
               
                <th>{{$comment->id}}</th>
                {{-- <th><img height="50" src="{{$comment->photo_id? $comment->photo->file : 'https://placehold.it/400x400'}} " alt=""></th> --}}
                {{-- <th><img height='25' width="25" src="{{$comment->photo->file}}" alt="photo"></th> --}}
            {{-- <th> <a href="{{route('comments.edit', $comment->id)}}">{{$comment->name}}</a></th> --}}
                <th>{{$comment->author}}</th>
                <th>{{$comment->email}}</th>
            {{-- <th><a href="{{'/admin/comments', $comment->id}}">{{$comment->title}}</a></th> --}}
                <th>{{$comment->body}}</th>

                <th>{{$comment->created_at->diffForHumans()}}</th>
                <th><a href="{{route('home.post', $comment->post->id)}}">View Post</a></th>
                <th>
                    @if($comment->is_active == 1)
                <form  class="form" method="PUT" action="{{route('comments.edit', $comment->id)}}" enctype="multipart/form-data">
                        {{-- {{csrf_field()}} --}}
                        <input type="hidden" name="is_active" value="0">
                    {{-- <input type="hidden" name="comment_id" value="{{$comment->id}}"> --}}
                        {{-- <input type="hidden" name="_method" value="GET"> --}}
                        <div class="form-group">
                        <input class="btn btn-success" type="submit" value="Un-approve">
                        </div>
                    </form>
                    @else
                    <form  class="form" method="PUT" action="{{route('comments.edit', $comment->id)}}" enctype="multipart/form-data">
                        {{-- {{csrf_field()}} --}}
                        <input type="hidden" name="is_active" value="1">
                    {{-- <input type="hidden" name="comment_id" value="{{$comment->id}}"> --}}
                        {{-- <input type="hidden" name="_method" value="GET"> --}}
                        <div class="form-group">
                        <input class="btn btn-info" type="submit" value="Approve">
                        </div>
                    </form>
                    @endif
                    
                </th>
                <th>
                        {!!Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]])!!}
                        <div class="form-group">
                        {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!} 
                        </div>
                        {!!Form::close()!!}
                </th>
                
            </tr>
            @endforeach
        </tbody>
        
        </table>
        
        @else
        <h1>No Comments</h1>
        @endif
        
@endsection