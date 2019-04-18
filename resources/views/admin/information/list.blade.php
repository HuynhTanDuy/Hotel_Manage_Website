@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Information
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
                                <th>Name</th>
                                <th>Slogan</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                               
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($information as $inf)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$inf->name}}</td>
                                    <td>{{$inf->slogan}}</td>
                                    <td>{{$inf->email}}</td>
                                    <td>{{$inf->phone_number}}</td>
                                    <td>{{$inf->address}}</td>

                                    
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/information/edit">Edit</a></td>
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