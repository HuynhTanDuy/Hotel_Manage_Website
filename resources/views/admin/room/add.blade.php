@extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Room
                            <small>Add</small>
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

                        <form action="admin/room/addpost" method="POST">
                             @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           
                            <div class="form-group">
                                <label>Tên phòng </label>
                                <input class="form-control" name="name"  />
                            </div>
                            <div class="form-group">
                                <label>Loại phòng</label>
                                <select class="form-control" name="idCategory">
                                    <label>Loại phòng</label>
                                    @foreach ($categoryRoom as $cr)
                                    <option value="{{$cr->id}}" > {{$cr->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <select class="form-control" name="status">
                                    <label>Tình trạng</label>
                                    <option value="1" > Trống</option>
                                    <option value="0" > Đã được đặt</option>
                              
                                </select>
                            </div>
                            
                            
                            
                            <button type="submit" class="btn btn-default">Add </button>
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