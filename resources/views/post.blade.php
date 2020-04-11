@extends('layouts.blog-post')

@section('content')
<!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at? $post->created_at->diffForHumans(): '' }}</p>

                <hr>

                <!-- Preview Image -->
            <img class="img-responsive" src="{{$post->photo->file}}" alt="">

                <hr>

                <!-- Post Content -->
            <p class="lead">{{$post->body}}</p>

                <hr>

                <!-- Blog Comments -->
@if(Auth::check())
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                <form method="post" action="/admin/comments" role="form">
                    {{csrf_field()}}
                <input type="hidden" name="post_id" value="{{$post->id}}">
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
@endif
                <hr>

                <!-- Posted Comments -->
@if(count($comments)>0)
@foreach($comments as $comment)
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                    <img class="media-object" height="64" src="{{$comment->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                    <p>{{$comment->body}}</p>
@if(count($comment->replies)>0)
@foreach ($comment->replies as $reply)
                        <div class="reply-container">
                            <button class="toggle-reply btn btn-primary">Reply</button>
                    <div class="media" style="margin-top: 40px;">
                        <a class="pull-left" href="#">
                        <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                        </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$reply->author}}
                            <small>{{$reply->created_at->diffForHumans()}}</small>
                        </h4>
                       {{$reply->body}}
                    </div>
                
                    </div>
                    <form  class="form" method="post" action="{{route('comment.createreply')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        <br>
                        <div class="form-group">
                            
                            {{-- <label for="body">Body</label> --}}
                        <textarea class="form-control" type="text" name="body"></textarea>
                        </div>
                        <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Create Reply">
                        </div>
                    </form>
                </div>
                
 @endforeach
@endif
                </div>
            </div>

@endforeach
@endif

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>
@stop

@section('scripts')
    
@endsection