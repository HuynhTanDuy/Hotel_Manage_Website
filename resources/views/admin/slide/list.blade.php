@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
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
                                <th>Link hình ảnh</th>
                                <th>Caption</th>
                                
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slide as $sl)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$sl->id}}</td>
                                    <td> <img style="max-width: 200px;max-height: 200px;" src="{{$sl->link}}"> </td>
                                    <td>{{$sl->caption}}</td>
                                   
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/edit/{{$sl->id}}">Edit</a></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/delete/{{$sl->id}}" onclick="return confirm('Bạn có chắc muốn xóa ?');"> Delete</a></td>
                                    
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