@extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category Room
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

                        <form action="admin/category_room/editPost/{{$category_room->id}}" method="POST" enctype="multipart/form-data">
                             @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           
                            <div class="form-group">
                                <label>Tên loại phòng </label>
                                <input class="form-control" name="name" value="{{$category_room->name}}"  />
                            </div>

                            <div class="form-group">
                                <label>Ảnh </label>
                                <input type="file" class="form-control" name="image" value="{{$category_room->image}}"  />
                            </div>

                            <div class="form-group">
                                <label>Giá </label>
                                <input  class="form-control" name="price" value="{{$category_room->price}}"  />
                            </div>

                            <div class="form-group">
                                <label>Mô tả </label>
                                <input  class="form-control" name="description" value="{{$category_room->description}}"  />
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