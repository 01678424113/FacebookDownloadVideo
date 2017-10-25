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
            <form role="form" action="{{route('postAddArticle')}}" method="post" id="article-form">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" id="title" placeholder="Enter text" name="txt_title">
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input class="form-control" id="slug" placeholder="Enter text" name="txt_slug">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="txt_description"></textarea>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control summernote" rows="3" name="txt_content"></textarea>
                </div>
                <div class="form-group">
                    <label>Keyword</label>
                    <textarea class="form-control" rows="3" name="txt_keyword"></textarea>
                </div>

                <button type="submit" class="btn btn-default">Add setting</button>
                <a href="{{route('listArticle')}}" class="btn btn-default">Return</a>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#title").keyup(function(){
            var slug = $(this).val();
            slug = slug.toLowerCase();
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            slug = slug.replace(/[^a-zA-Z0-9]+/g,'-');
            $("#slug").val(slug);
        });
        $(document).ready(function () {
            $('#article-form').validate({
                errorElement: 'span',
                errorClass: 'help-block',
                focusInvalid: false,
                rules: {
                    'txt_title': {
                        required: true
                    },
                    'txt_slug': {
                        required: true
                    },
                    'txt_description': {
                        required: true
                    },
                    'txt_content': {
                        required: true
                    }
                },
                messages: {
                    'txt_title': {
                        required: "Must not to blank title !"
                    },
                    'txt_slug': {
                        required: "Must not to blank static path !"
                    },
                    'txt_description': {
                        required: "Must not to blank description !"
                    },
                    'txt_content': {
                        required: "Must not to blank content !"
                    }
                }
            })
        });
    </script>
@endsection
