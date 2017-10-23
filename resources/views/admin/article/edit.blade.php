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
            <form role="form" action="{{route('postEditArticle',['article_id'=>$article->id])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" placeholder="Enter text" name="title" value="{{$article->title}}">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" rows="3" name="txt_content">{!! $article->content !!}</textarea>
                </div>
                <div class="form-group">
                    <label>Keyword</label>
                    <textarea class="form-control" rows="3" name="keyword">{{$article->keyword}}</textarea>
                </div>

                <button type="submit" class="btn btn-default">Edit article</button>
                <a href="{{route('listArticle')}}" class="btn btn-default">Return</a>
            </form>
        </div>
    </div>
@endsection