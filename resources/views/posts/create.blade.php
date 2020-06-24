



@extends('layouts.app')
@section('title' , 'add new post')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!- start post content-->
                        <a href="{{ route('posts.index') }}"><button class="btn btn-secondary col-lg-12">Go to the Home Page</button></a> <br><br><hr>

                        @if(count($errors) > 0)
                            @foreach($errors as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form  class="form-group" action="{{ route('posts.store')}} " method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="formGroupExampleInput">put the title post</label>
                                <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                            </div>



                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">chose getogry</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>


                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"  name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose post image</label>
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">put the content post</span>
                                </div>
                                <textarea class="form-control" rows="10" cols="45"  aria-label="With textarea" name="content"></textarea>
                            </div>

{{--                            @include('test')--}}



                            <input class="btn btn-primary" type="submit" value="add">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



