@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Information
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
                        <form action="admin/information/editPost"  method="POST">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Tên Khách Sạn</label>
                                <input class="form-control" name="name"  value="{{$information->name }}" />
                            </div>
                             <div class="form-group">
                                <label>Slogan</label>
                                <input class="form-control" name="slogan"  value="{{$information->slogan }}" />
                            </div>
                             <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email"  value="{{$information->email }}" />
                            </div>
                             <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="phone_number"  value="{{$information->phone_number }}" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ </label>
                                <input class="form-control" name="address"  value="{{$information->address }}" />
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