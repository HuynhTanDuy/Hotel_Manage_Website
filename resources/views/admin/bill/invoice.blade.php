<!DOCTYPE html>
<html>
<head>
	<title>Hóa đơn khách hàng</title>
</head>
<body>

	Họ và tên: {{$reservation[0]->name}}  <br>
	Ngày nhận phòng: {{$reservation[0]->DateIn}}  <br>
	Ngày thanh toán: {{$reservation[0]->DateOut}}  <br>
	<table>
		<thead>
		    <tr>
		    	<th>Nội dung</th>
		        <th>Giá</th>
		    </tr>
	    </thead>
    <tbody>
	    @foreach ($bill as $item)
	        <tr>
	        	<td>{{$item->content}}</td>
	        	<td>{{$item->price}} $</td>
	        </tr>
	    @endforeach    
	    
    </tbody>
	</table>
	
	<h2> Tổng hóa đơn:  {{$reservation[0]->total_bill}} $  </h2>

	

</body>
</html>