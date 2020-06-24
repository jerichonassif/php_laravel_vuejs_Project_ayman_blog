@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add new Post</div>

                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(session('msgedit'))
                            <div class="alert alert-success" role="alert">
                                {{ session('msgedit') }}
                            </div>

                        @endif
                        @if(session('msgadd'))
                            <div class="alert alert-success" role="alert">
                                {{ session('msgadd') }}
                            </div>

                        @endif

                        @if(session('msgdeleted'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('msgdeleted') }}
                            </div>
                        @endif

                        @if(count($errors) > 0)
                            @foreach($errors as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ Message}}
                                </div>
                            @endforeach
                        @endif

                        <form class="form-group" action="{{ route('postadmin.store')}} " method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <label for="exampleFormControlInput1"> put the title post</label>
                            <input class="form-control" type="text" name="title"><br><br>

                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="inputGroupFile01"
                                           aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose post image</label>
                                </div>
                            </div>

                            <label for="exampleFormControlTextarea1"> put the content post</label>
                            <textarea class="form-control" rows="10" cols="45" name="content"></textarea><br><br>
                            <input class="btn btn-primary" type="submit" value="add">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(count($posts) > 0)

        {{ $posts->links() }}
        <table class="table">

            <thead>

            <tr>
                <th scope="col">Post id</th>
                <th scope="col">Post Title</th>
                <th scope="col">Post Content</th>
                <th scope="col">Post Image</th>
                <th scope="col"> Edit</th>
                <th scope="col">Delet</th>

            </tr>

            </thead>
            <tbody>
            @foreach($posts as $post)

                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td><img src="{{ asset($post->image) }}" width="100px" height="100px"></td>


                    <td>
                        <a class="btn btn-info col-lg-12"
                           href="{{ route('postadmin.edit' , $post->id) }}">edit</a><br><br>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('postadmin.destroy' , $post->id) }}">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <input class="btn btn-danger col-lg-12" type="submit" value="DELETE">

                    </td>


                </tr>

            @endforeach
            </tbody>

        </table>

        <!-- Footer -->
        <footer class="page-footer font-small blue">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2019-2020 Copyright:
                <a href="#"> AymanBlog.com</a>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->

    @endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
