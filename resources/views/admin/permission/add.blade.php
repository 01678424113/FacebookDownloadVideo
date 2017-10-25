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
            <form role="form" action="{{route('postAddPermission')}}" method="post" id="permission_form">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" placeholder="Enter text" name="name">
                </div>
                <button type="submit" class="btn btn-default">Add permission</button>
                <a href="{{route('listPermission')}}" class="btn btn-default">Return</a>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#permission_form').validate({
                errorElement: 'span',
                errorClass: 'help-block',
                focusInvalid: false,
                rules: {
                    'name': {
                        required: true
                    }
                },
                messages: {
                    'name': {
                        required: "Must not to blank name !"
                    }
                }
            })
        });
    </script>
@endsection