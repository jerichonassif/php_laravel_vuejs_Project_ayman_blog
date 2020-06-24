@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="container">


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


            @if(session('msgedit'))
                <div class="alert alert-success" role="alert">
                    {{ session('msgedit') }}
                </div>

            @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('add new user') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <registerstrong>{{ $message }}</registerstrong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>{{ __('') }}
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@if(count($users) > 0)

    {{ $users->links() }}
    <table class="table">

        <thead>

        <tr>
            <th scope="col">user id </th>
            <th scope="col">user name</th>
            <th scope="col">Email user</th>
            <th scope="col"> Edit</th>
            <th scope="col">Delet</th>


        </tr>

        </thead>
        <tbody>
        @foreach($users as $user)

        <tr>
            <th scope="row">{{ $user->id }}
                @if($user->isadmin == 1)
                <span class="btn btn-success" >Admin</span>
                @endif
            </th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a  class="btn btn-info col-lg-12" href="{{ route('users.edit' , $user->id) }}">edit</a><br><br>
            </td>
            <td>
                <form method="POST" action="{{ route('users.destroy' , $user->id) }}">
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
