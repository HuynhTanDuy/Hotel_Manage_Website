@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bill
                            <small>{{$reservation->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if (session('annoucement'))
                        <div class="alert alert-success">
                            {{session('annoucement')}}
                        </div>
                    @endif
                    <?php $sum=0; ?>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                {{-- <th>ID</th> --}}
                                <th>Nội dung</th>
                                <th>Chi phí</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bill as $b)
                                <tr class="odd gradeX" align="center">
                                    {{-- <td>{{$b->id}}</td> --}}
                                    <td>{{$b->content}}</td>
                                    <td>{{$b->price}} $</td>
                                     <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/bill/delete/{{$b->id}}/{{$reservation->id}}"> Delete</a></td>                              
                                </tr>
                                <?php $sum=$sum+$b->price; ?>
                            @endforeach
                        </tbody>

                    </table>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                       <button type="button" class="btn btn-warning"> <a href="admin/bill/add/{{$reservation->id}}"> Thêm dịch vụ </a> </button>
                       <button class="btn btn-warning"> <a href="exportInvoice/{{$reservation->id}}">Xuất hóa đơn</a>   </button>
                       <button class="btn btn-warning"> <a href="admin/reservation/delete/{{$reservation->id}}">Trả phòng</a>   </button>

                    </div>
                </div>
                 <div class="row">
                    <div class="col-lg-12">
                       <h2>Tổng chi phí: {{$sum}} $</h2>
                    </div>
                </div>
                
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection