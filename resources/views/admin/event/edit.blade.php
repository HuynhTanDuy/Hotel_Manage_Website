@extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Event
                            <small>Edit</small>
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

                        @if (session('annoucement'))
                        <div class="alert alert-success">
                            {{session('annoucement')}}
                        </div>
                        @endif

                        <form action="admin/event/editPost/{{$event->id}}" method="POST" enctype="multipart/form-data">
                             @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           
                            <div class="form-group">
                                <label>Tên Event</label>
                                <input class="form-control" name="name" value="{{$event->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <input class="form-control" name="body" value="{{$event->body}}"/>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" class="form-control" name="image"  />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Edit </button>
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