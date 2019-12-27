@extends('admin.layout.index')
@section('content')
	<!-- Main Application (Can be VueJS or other JS framework) -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2 style="text-align: center;"> Danh sách hóa đơn tháng 
                    <select id="month">
                        @for ($i=1;$i<=12;$i++)
                        <option @if ($i==$idMonth) selected @endif >{{$i}}</option>
                        @endfor
                        
                    </select>
                </h2> 
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                            <tr align="center">
                                
                                <th>Họ tên khách hàng</th>
                                {{-- <th>Tên phòng</th> --}}
                                <th>Tổng hóa đơn</th>
                                <th>Ngày thanh toán</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservation as $r)
                                <tr class="odd gradeX" align="center">
                                    <td> {{$r->name}}</td>
                                    {{-- <td> $r->room</td> --}}
                                    <td> {{$r->total_bill}}</td>
                                    <td> {{$r->DateOut}}</td>

                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>       
            </div>
            <div class="row">
                <div class="col-lg-12">
            <canvas id="reportChart" width="300" height="300" style="max-height: 500px !important;">
            </canvas>
            <!-- End Of Main Application -->
                </div>
                <h2 style="text-align: center;"> Biểu đồ Doanh thu tháng {{$idMonth}}</h2>
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
        month=$('#month');
        renderChart(month.val());
        month.change(function(){
            // renderChart(month.val());
            window.location.href = "/admin/monthReport/" + month.val();
        })
        
    });
    function renderChart(month) {
        var request = $.ajax({
                          url: "/api/getMonthReportData/"+month ,
                          method: "GET",    
                          //data: room.val()
                      });
        request
        .done(function(response){
            var labels = [], values = [], data=response.data;
            data.forEach(function(item, index){
                var day = new Date(item.DateOut) ;
                labels.push(day.getDate());
                values.push(item.total_bill);
            });
            console.log(values);
            render(labels, values);
        });
    }

    function render(labels, values)
    {
        var reportChart=document.getElementById('reportChart');
    var myChart = new Chart(reportChart, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: '',
            data: values,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
    }    
</script>
@endsection