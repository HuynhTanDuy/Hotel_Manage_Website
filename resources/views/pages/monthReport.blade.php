@extends('admin.layout.index')
@section('content')
	<!-- Main Application (Can be VueJS or other JS framework) -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2 style="text-align: center;"> Danh sách hóa đơn</h2>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                            <tr align="center">
                                
                                <th>Họ tên khách hàng</th>
                                <th>Tên phòng</th>
                                <th>Tổng hóa đơn</th>
                                <th>Ngày thanh toán</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($reservation as $r) --}}
                                <tr class="odd gradeX" align="center">
                                    <td> Huỳnh Tấn Duy</td>
                                    <td> A100</td>
                                    <td> 200$</td>
                                    <td>9-10-2019</td>

                                </tr>
                                <tr class="odd gradeX" align="center">
                                    <td> Huỳnh Phương Duy</td>
                                    <td> B105</td>
                                    <td> 100$</td>
                                    <td>20-10-2019</td>
                                    
                                </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>       
            </div>
            <div class="row">
                <div class="col-lg-12">
            <canvas id="reportChart" width="300" height="300" style="max-height: 500px !important;">
            </canvas>
            <!-- End Of Main Application -->
                </div>
                <h2 style="text-align: center;"> Biểu đồ Doanh thu tháng 11</h2>
            </div>

        </div>
    </div>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
@endsection

{{-- {!! $chart->script() !!} --}}
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        renderChart(12);
    });
    function renderChart(month) {
        var request = $.ajax({
                          url: "http://localhost/Hotel_Manage_Website/public/api/getMonthReportData/"+11 ,
                          method: "GET",
                          //data: room.val()
                      });
        request
        .done(function(response){
            var labels = [], values = [], data=response.data;
            data.forEach(function(item, index){
                var day = new Date(item.DateOut) ;
                labels.push(day.getDate());
                values.push(item.)
            });
            console.log(labels);return;
            
    
        });
    }    
</script>
@endsection