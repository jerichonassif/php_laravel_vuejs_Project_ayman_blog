@extends('layouts.app')
@section('title' , 'Post Page' )
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
                        @if(count($posts) > 0)
                            {{ $posts->links() }}
                            <div class="row">
                                @foreach($posts as $post)
                                    <div class="col-lg-4">
                                        <div class="card  ">
                                            <img src="{{$post->image}}" height="430" width="240"
                                                 class="card-img-top img-fluid" alt="{{$post->title}}">
                                            <div class="card-body text-container">
                                                <h5 class="card-title"><a
                                                        href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>

                                                </h5>
                                                <a href="{{ route('profile.index' , $post->user_id) }}"><h2
                                                        class="card-title btn btn-warning">{{ $post->user->name }}</h2>
                                                </a>
                                                <h3 class="card-title btn btn-warning">{{ $post->created_at }}</h3>
                                                <p class="card-text ">{{ $post->content }}</p>


                                            {{--@if (!Auth::guest() && (Auth::user()->isadmin == 1) )--}}
                                            @if ( Auth::id() == $post->user_id )

                                                <a class="btn btn-info btn-block "
                                                   href="{{ route('posts.edit', $post->id)}}">Edit</a>


                                                <form method="POST"
                                                      action="{{ route('posts.destroy' , $post->id) }}">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                    <button class="btn btn-danger btn-block " type="submit"
                                                            value="DELETE">delete</button>
                                                </form>



                                                <a class="btn btn-success  btn-block"
                                                   href="{{ route('posts.show', $post->id) }}">Show</a>





                                    @endif
</div>

</div>
</div>

@endforeach
</div>

{{ $posts->links() }}
@endif
</div>
</div>
</div>
</div>
</div>
<!-- production version, optimized for size and speed -->
<script src="https://cdn.jsdelivr.net/npm/vue"></script>

<div id="app">
@{{ message }}
</div>

<script>

var app = new Vue({
el: '#app',
data: {
message: 'Hello Vue!'
}
})

</script>

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
