<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\CategoryRoom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Room;
use App\Reservation;
use App\DetailBill;

class ApiController extends Controller
{
	public function getRoomType()
    {
        $data=CategoryRoom::all();
        return response()->json([
            'code' => '200',
            'data' => $data
        ]);
    }

    public function testPost()
    {
        $name = Input::get('name');
        return $name;
    }


    public function getRoomAvailable($idroom)
    {   
        $room_taken=Room::where('Status',1)
                    ->where('idCategory',$idroom)
                    ->take(1)
                    ->first();
        if ($room_taken) 
            return response()->json([
                'code' => '200',
                'room_taken' => $room_taken,
                'category' => $room_taken->categoryRoom
            ]);  
        else return response()->json([
                'code' => '400',
                'message' => 'Hết Phòng'
        ]);
    }

    public function getMonthReportData($idMonth)
    {
        $reservation=Reservation::where('status',1)
                     ->whereMonth('DateOut',$idMonth)
                     ->get();
        return response()->json([
            'code' => '200',
            'data' => $reservation
        ]);
    }

    public function postReservation()
    {   
        $room_category = Input::get('room_category');


        $room=Room::where('Status',1)->where('idCategory',$room_category)->get();
        if (count($room)>0) 
        {
            $roomtaken=Room::where('Status',1)->where('idCategory',$room_category)->take(1)->get();
            
            $reservation=new Reservation;
            $reservation->name=Input::get('name');    
            $reservation->email=Input::get('email'); 
            $reservation->phone=Input::get('phone'); 
            $reservation->DateIn=Input::get('dateIn'); 
            $reservation->DateOut=Input::get('dateOut'); 
            $reservation->Numbers=Input::get('numbers'); 
            $reservation->Notes=Input::get('note'); 
            $reservation->idRoom=$roomtaken[0]->id; 
            $roomtaken[0]->Status=0;
            $reservation->save();

            

            $r=Room::find($reservation->idRoom);
            $cate=CategoryRoom::find($r->idCategory);
           
            $day= (strtotime($reservation->DateOut) - strtotime($reservation->DateIn))/60/60/24;
            $bill=new DetailBill;
            $bill->content='Tiền phòng';
            $bill->price= $cate->price*$day;
            $bill->idReservation=$reservation->id;
            $bill->created_at=Input::get('dateOut');

            
            $roomtaken[0]->save();
            $bill->save();

            return response()->json([
                'code' => '200',
                'message' => 'Đặt chỗ thành công.Phòng của bạn là '.$roomtaken[0]->name .'  .See you soon !',
                'data' => $reservation
            ]);  
            
        }
        else return response()->json([
                'code' => '400',
                'message' => 'Loại phòng bạn đặt đã hết. Vui lòng tham khảo các loại phòng còn lại trong hệ thống khách sạn. Xin cảm ơn !',
             ]);   

            
    }
}	
 ?>