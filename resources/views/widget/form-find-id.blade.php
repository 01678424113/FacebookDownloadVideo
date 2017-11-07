<div class="jumbotron">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                @if(session('facebook_id'))
                    <a class="btn btn-default" href="{{route('getFindId')}}">Return find id another.</a>
                @endif
                <center>
                    <a href="{{route('home')}}"><img class="img-responsive" src="{{$logo}}" alt="Find FB ID - Download Facebook Videos"
                                             title="Find Facebook ID" width="70px"></a>
                    <h1 style="font-size:24px;margin-top:1%;">
                        Facebook Find ID By URL
                    </h1>
                    <h2 style="margin-top: 0;font-size:26px;">
                        <small>Find ID Facebook Now</small>
                    </h2>
                    <br/><br/>
                    @if(!session('facebook_id'))
                        <form action="{{route('postFindId')}}" method="post">
                            {{csrf_field()}}
                            <div class="input-group col-lg-8">
                                <input name="url_find_id" class="form-control input-lg"
                                       placeholder="Enter Facebook URL ..." type="url">
                                <span class="input-group-btn"><button class="btn btn-primary input-lg" id="btn-download"
                                                                      type="submit">Find ID NOW</button></span>
                            </div>
                        </form>
                        <br>
                        <p style="font-size: 20.3px;">Example: https://www.facebook.com/nguyenlan.dev</p>
                    @endif
                </center>
            </div>
        </div>
        <div class="row">
            @if((session('facebook_id')))
                <div class="col-md-4 col-md-offset-4" >
                    <div class="alert alert-success" style="font-size: 25px;text-align: center">
                        {{session('facebook_id')}}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

