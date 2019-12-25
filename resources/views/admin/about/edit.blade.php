@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">About
                            <small>Edit </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                        <div class="alert alert-danger"> 
                             @foreach ($errors->all() as $err) 
                                {{$err}} <br>
                            @endforeach
                        </div>
                        @endif
                        @if (session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                        <form action="admin/about/editPost"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Nội dung miêu tả</label>
                                <input class="form-control" name="body"  value="{{$about->body }}" />
                            </div>
                             <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image"/>
                            </div>
                             <div class="form-group">
                                <label>Video</label>
                                <input class="form-control" name="video"  value="{{$about->video }}" />
                            </div>
                            
                            
                            <button type="submit" class="btn btn-default">Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection