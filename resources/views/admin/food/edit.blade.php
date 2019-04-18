@extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Food
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

                        <form action="admin/food/editPost/{{$food->id}}" method="POST">
                             @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           
                            <div class="form-group">
                                <label>Tên Món ăn</label>
                                <input class="form-control" name="name" placeholder="Please Enter Món ăn Name" value="{{$food->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Miêu tả</label>
                                <input class="form-control" name="description" placeholder="Please Enter description" value="{{$food->description}}" />
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" name="price" placeholder="Please Enter Price" value="{{$food->price}}" />
                            </div>
                             <div class="form-group">
                                <label>Loại món ăn</label>
                                <select class="form-control" name="idCategory">
                                    <label>Thể loại</label>
                                    @foreach ($categoryFood as $cf)
                                    <option value="{{$cf->id}}" @if ($cf->id==$food->idCategory) {{"selected"}} @endif > {{$cf->name}}</option>
                                    @endforeach
                                </select>
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