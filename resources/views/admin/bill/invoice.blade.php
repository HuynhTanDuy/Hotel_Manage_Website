<!DOCTYPE html>
<html>
<head>
	<title>Hóa đơn khách hàng</title>
</head>
<body>

	<h5> Họ và tên: {{$reservation[0]->name}}   </h5>
	<h5> Ngày nhận phòng: {{$reservation[0]->DateIn}}  </h5> 
	<h5> Ngày thanh toán: {{$reservation[0]->DateOut}}  </h5>  
	<table>
		<thead>
		    <tr>
		    	<th><h2>Nội dung</h2></th>
		        <th><h2>Giá</h2></th>
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