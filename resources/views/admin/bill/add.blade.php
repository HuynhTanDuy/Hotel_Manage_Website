@extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bill
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

                        <form action="admin/bill/addpost/{{$reservation->id}}" method="POST">
                             @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           
                           
                            <div class="form-group">
                                <label>Nội dung</label>
                                <input class="form-control" name="content" placeholder="Please Enter Body" />
                            </div>
                             <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" name="price" placeholder="Please Enter Body" />
                            </div>
                           
                            
                            <button type="submit" class="btn btn-default">Thêm </button>
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