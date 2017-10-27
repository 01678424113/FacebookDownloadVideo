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
            <form role="form" action="{{route('postAddAutoArticle')}}" method="post" id="article-form">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Title</label>
                    <textarea class="form-control" rows="3" name="txt_title"></textarea>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="txt_description"></textarea>
                </div>
                <div class="form-group">
                    <label>Keyword</label>
                    <textarea class="form-control" rows="3" name="txt_keyword"></textarea>
                </div>
                <button type="submit" class="btn btn-default">Add auto article</button>
                <a href="{{route('listAutoArticle')}}" class="btn btn-default">Return</a>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#article-form').validate({
                errorElement: 'span',
                errorClass: 'help-block',
                focusInvalid: false,
                rules: {
                    'txt_title': {
                        required: true
                    },
                    'txt_description': {
                        required: true
                    },
                    'txt_keyword': {
                        required: true
                    }
                },
                messages: {
                    'txt_title': {
                        required: "Must not to blank title !"
                    },
                    'txt_description': {
                        required: "Must not to blank description !"
                    },
                    'txt_keyword': {
                        required: "Must not to blank keyword !"
                    }
                }
            })
        });
    </script>
@endsection
