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
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
            @endif
            <form role="form" action="{{route('postAddUser')}}" method="post" id="user_form">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" placeholder="Enter text" name="username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" id="password" placeholder="Enter text" name="password">
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
                    <label class="control-label">Permission</label>
                    <select class="form-control" name="permission_id">
                        @foreach($permissions as $permission)
                            <option value="{{ $permission->id }}">{!! $permission->name !!}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Add user</button>
                <a href="{{route('listUser')}}" class="btn btn-default">Return</a>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#user_form').validate({
                errorElement: 'span',
                errorClass: 'help-block',
                focusInvalid: false,
                rules: {
                    'username': {
                        required: true
                    },
                    'password': {
                        required: true
                    },
                    'confirm_password': {
                        required: true,
                        equalTo: "#password"
                    },
                    'name': {
                        required: true
                    },
                    'permission_id': {
                        required: true
                    }
                },
                messages: {
                    'username': {
                        required: "Must not to blank username !"
                    },
                    'password': {
                        required: "Must not to blank static password !"
                    },
                    'confirm_password': {
                        required: "Must not to blank static confirm password !",
                        equalTo: "Please enter the same password as above !"
                    },
                    'name': {
                        required: "Must not to blank static name !"
                    },
                    'permission_id': {
                        required: "Must not to blank static permission !"
                    }
                }
            })
        });
    </script>
@endsection