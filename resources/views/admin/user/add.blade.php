@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$title}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @elseif(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <form role="form" action="{{route('postAddUser')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" placeholder="Enter text" name="username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" placeholder="Enter text" name="password">
                </div>
                <div class="form-group">
                    <label>Confirm password</label>
                    <input class="form-control" type="password" placeholder="Enter text" name="confirm_password">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" placeholder="Enter text" name="name">
                </div>
                <div class="form-group">
                    <label>Permission</label>
                    <input class="form-control" placeholder="Enter text" name="permission">
                </div>
                <button type="submit" class="btn btn-default">Add user</button>
                <a href="{{route('listUser')}}" class="btn btn-default">Return</a>
            </form>
        </div>
    </div>
@endsection