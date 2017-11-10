@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$title}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 55px">
                    <div class="col-md-8" style="height: 100%;display: flex;align-items: center;">
                        List hot videos
                    </div>
                    <div class="col-md-4">
                        <form action="{{route('listHotVideo')}}" method="get">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" name="video_id_search" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @elseif(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        @if(count($hotVideos) > 0)
                        <thead>
                        <tr>
                            <th>Video ID</th>
                            <th>Thumbnails</th>
                            <th>Title</th>
                            <th>Title slug</th>
                            <th>Download at</th>
                            <th style="width: 80px">Edit</th>
                            <th style="width: 80px">Delete</th>
                        </tr>
                        </thead>

                            <tbody>
                            @foreach($hotVideos as $hotVideo)
                                <tr class="odd gradeX">
                                    <td>{{$hotVideo->video_id}}</td>
                                    <td>
                                        <img src="{{$hotVideo->thumbnails}}" alt="" style="max-width: 200px">
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{route('showVideo',['video_id'=>$hotVideo->video_id,'title_slug'=>$hotVideo->title_slug.".html"])}}">{{$hotVideo->title_video}}</a>
                                    </td>
                                    <td>{{$hotVideo->title_slug}}</td>
                                    <td>
                                        <div>{!! date('d/m/Y', $hotVideo->download_at) !!}</div>
                                    </td>
                                    <td class="center">
                                        <a href="{{route('getEditHotVideo',['hot_video_id'=>$hotVideo->video_id])}}"
                                           class="btn btn-info" disabled="">Edit</a>
                                    </td>
                                    <td class="center">
                                        <button type="button" data-toggle="modal" data-target="#myModal-{{$hotVideo->video_id}}"
                                                class="btn btn-danger">Delete
                                        </button>
                                        <!-- Modal delete -->
                                        <div id="myModal-{{$hotVideo->video_id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;
                                                        </button>
                                                        <h4 class="modal-title">Delete</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure want to delete ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('deleteHotVideo',['hot_video_id'=>$hotVideo->video_id])}}"
                                                           class="btn btn-danger">Delete</a>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        @else
                            <p>Data empty</p>
                        @endif
                    </table>
                {{$hotVideos->links()}}
                <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection