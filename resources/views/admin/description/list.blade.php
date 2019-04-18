@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Description
                            <small>Paradise Resort</small>
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
                                <th>Room</th>
                                <th>Photo</th>
                                <th>Menu</th>
                                <th>Event</th>
                                
                               
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($description as $inf)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$inf->room}}</td>
                                    <td>{{$inf->photo}}</td>
                                    <td>{{$inf->menu}}</td>
                                    <td>{{$inf->event}}</td>

                                    
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/description/edit">Edit</a></td>
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