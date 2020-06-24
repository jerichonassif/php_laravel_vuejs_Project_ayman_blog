

@extends('layouts.app')
@section('title' , 'Edit post' )
@section('content')

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ route('posts.index') }}"><button class="btn btn-secondary col-lg-12">Go to the Home Page</button></a> <br><br><hr>


                        <form action="{{ route('posts.update' , $post->id)}} " class="form-group" enctype="multipart/form-data"
                              method="post">
                            {{ method_field('PUT') }}
                            {{csrf_field()}}
                            <label for="exampleFormControlInput1"> edit the title post</label>
                            <input  class="form-control" type="text" name="title" value="{{ $post->title }}" ><br><br>


                            <div class="input-group mb-3">

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"  name="image"  value="{{ $post->image }}" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>

                            <label for="exampleFormControlTextarea1"> edit the content post</label>
                            <textarea  class="form-control" rows="10" cols="45" name="content" >{{ $post->content  }}></textarea><br><br>
                            <input class="btn btn-primary" type="submit" value="edit">
                        </form>
                    </div>
                </div>
            </div>
        </div>


@endsection
