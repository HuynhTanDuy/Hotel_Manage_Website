@extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Reservation
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

                        <form action="admin/reservation/addpost" method="POST">
                             @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           
                            <div class="form-group">
                                <label>Tên phòng </label>
                                <select class="form-control" name="idRoom">
                                    <label>Tên phòng</label>
                                    @foreach ($room as $r)
                                    <option value="{{$r->id}}"  > {{$r->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Họ tên khách hàng</label>
                                <input class="form-control" name="name" placeholder="Please Enter Price"  />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="phone" placeholder="Please Enter Price"  />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Please Enter Price"  />
                            </div>
                            <div class="form-group">
                                <label>Ngày đến </label>
                                <input type="date" class="form-control" name="DateIn" placeholder="Please Enter Price"  />
                            </div>
                            <div class="form-group">
                                <label>Ngày đi</label>
                                <input type="date" class="form-control" name="DateOut" placeholder="Please Enter Price"  />
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input class="form-control" name="Numbers" placeholder="Please Enter Price"  />
                            </div>
                            <div class="form-group">
                                <label>Notes</label>
                                <input class="form-control" name="Notes" placeholder="Please Enter Price"  />
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