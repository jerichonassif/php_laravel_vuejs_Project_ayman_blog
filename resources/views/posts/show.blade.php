@extends('layouts.app')
@section('title' , 'Show post' )
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">The Post</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif





                        <div class="card">
                            <div class="card-header">
                                <span class="btn btn-dark" >{{ $post->title }}</span>
                            </div>


                            <div class="card-body">
                                <img src="{{asset($post->image)}}"  class="card-img-top img-fluid" alt="{{$post->title}}">

                                <h3 class="card-title btn btn-warning ">{{ $post->user->name }}</h3>
                                <h5 class="card-title">{{ $post->created_at }}</h5>
                                <p class="card-text">{{ $post->content }}</p><br><hr>
                            </div>
                        </div><br>

                        @if(count($post->comments) > 0)

                            @foreach($post->comments as $comment)

                                <div class="media">
                                    <div class="media-body">
                                        <h5  class="mt-0 btn btn-dark"> user100</h5>

                                        <h5  style="color: #0a568c" class="mt-0">{{ $comment->created_at }}</h5>
                                        <p  class="lead">{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif





                        <form action="{{ route('comments.store' , ['post_id' => $post->id]) }}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputcomment">Enter Your Comment</label>
                                <input type="text" class="form-control" id="exampleInputcomment"  name="comment" aria-describedby="commentHelp" placeholder="Enter Your Comment">
                                <small id="commentHelp" class="form-text text-muted">We'll never share your comment with anyone else.</small>
                            </div>


                            <button type="submit" class="btn btn-primary">Comment</button>
                        </form>





                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small blue">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2019-2020 Copyright:
            <a href="#"> AymanBlog.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
@endsection
