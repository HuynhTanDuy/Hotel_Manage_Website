@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category Room
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if (session('annoucement'))
                        <div class="alert alert-success">
                            {{session('annoucement')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên loại phòng</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Mô tả</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category_room as $r)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$r->id}}</td>
                                    <td>{{$r->name}}</td>
                                    <td><img style="width: 200px;height: 200px;" src="{{$r->image}}"></td>
                                    <td>{{$r->price}}</td>
                                    <td>{{$r->description}}</td>
                                    
                                    
                                   
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/category_room/edit/{{$r->id}}">Edit</a></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/category_room/delete/{{$r->id}}" onclick="return confirm('Bạn có chắc muốn xóa ?');"> Delete</a></td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection