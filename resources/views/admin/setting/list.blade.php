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
                        List article
                    </div>
                    <div class="col-md-4">
                        <form action="{{route('listSetting')}}" method="get">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" name="key_setting_search"
                                       placeholder="Search...">
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
                    <table width="100%" class="table table-striped table-bordered table-hover"
                           id="dataTables-example">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Key</th>
                            <th>Value</th>
                            <th style="width: 80px">Edit</th>
                            <th style="width: 80px">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($settings as $setting)
                            <tr class="odd gradeX">
                                <td>{{$setting->id}}</td>
                                <td>{{$setting->key_setting}}</td>
                                <td>{{$setting->value_setting}}</td>
                                <td class="center">
                                    <a href="{{route('getEditSetting',['setting_id'=>$setting->id])}}"
                                       class="btn btn-info">Edit</a>
                                </td>
                                <td class="center">
                                    <a href="{{route('deleteSetting',['setting_id'=>$setting->id])}}"
                                       class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                {{$settings->links()}}
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