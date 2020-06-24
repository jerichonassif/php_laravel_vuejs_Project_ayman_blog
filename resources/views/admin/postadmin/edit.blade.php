@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header">Edit The Post</div>

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
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form  class="form-group" action="{{ route('postadmin.update' , $post->id)}} " method="post" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{csrf_field()}}

                            <label for="exampleFormControlInput1"> Edit the title post</label>
                            <input  class="form-control" type="text" name="title" value="{{ $post->title }}" ><br><br>

                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"  name="image" value="{{ $post->image }}" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose post image</label>
                                </div>
                            </div>

                            <label for="exampleFormControlTextarea1"> Edit the content post</label>
                            <textarea  class="form-control" rows="10" cols="45" name="content" >{{ $post->content  }}></textarea><br><br>
                            <input class="btn btn-primary" type="submit" value="Edit">
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
@stop

@section('content')
