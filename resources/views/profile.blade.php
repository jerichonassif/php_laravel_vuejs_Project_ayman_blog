@extends('layouts.app')
@section('title' , 'Profile Page' )
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body col-md-12">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!- start post content-->

                        @if(session('msgadd'))
                            <div class="alert alert-success" role="alert">
                                {{ session('msgadd') }}
                            </div>

                        @endif

                        @if(session('msgedit'))
                            <div class="alert alert-success" role="alert">
                                {{ session('msgedit') }}
                            </div>

                        @endif
                        @if(session('msgdeleted'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('msgdeleted') }}
                            </div>
                        @endif
                        <a href="{{ route('posts.create') }}">
                            <button class="btn btn-info col-lg-12">Add your post from here</button>
                        </a> <br><br>
                        <hr>
{{--                            @dd($user->count() > 0)--}}
                        @if($user->count() > 0)

{{--                            {{ $posts->links() }}--}}

                            <div class="row">
                                @if(!empty($user->posts))
                            @foreach($user->posts as $post)

                                <!--  <div class="card">
                                        <div class="card-header">
                                            <div class="card-header"><a href="{{ route('posts.show', $post->id) }}" ><span class="btn btn-dark">show post>{{ $post->title }}</span></a></div>
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title btn btn-warning">{{ $post->user->name }}</h3>
                                            <h5 class="card-title">{{ $post->created_at }}</h5>
                                            <p class="card-text">{{ $post->content }}</p>
                                        </div>-->


                                    <div class="col-lg-4 ">
                                        <div class="card">
                                            <img src="{{asset($post->image)}}"  class="card-img-top img-fluid" alt="{{$post->title}}">

                                            <div class="card-body">
                                                <h5 class="card-title"><a
                                                        href="#">
                                                        {{ $post->title }}</a></h5>
                                                <h2 class="card-title btn btn-warning">{{ $post->user->name }}</h2>
                                                <h3 class="card-title btn btn-warning">{{ $post->created_at }}</h3>
                                                <p class="card-text">{{ $post->content }}</p>
                                            </div>


                                            @if (!Auth::guest() && (Auth::user()->isadmin == 1) )
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <a class="btn btn-info col-lg-12"
                                                           href="#">edit</a>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <form method="POST" action="#">
                                                            {{ csrf_field() }}
                                                            {{method_field('DELETE')}}
                                                            <input class="btn btn-danger col-lg-12" type="submit"
                                                                   value="DELETE">
                                                        </form>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <a class="btn btn-success col-lg-12"
                                                           href="#">show</a>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    </div>



                                @endforeach
                                    @endif
                            </div>


{{--                            {{ $posts->links() }}--}}
                        @endif
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

