<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Reservation;
use App\CategoryReservation;
use App\Room;
use App\DetailBill;
use App\CategoryRoom;
class ReservationController extends Controller
{
	public function getReservation()
	{
		$reservation=Reservation::all();
        $room=Room::all();
		return view('admin.reservation.list',['reservation'=>$reservation,'room'=>$room]);
	}
	public function Edit($id)
	{
        $room=Room::all();
		$reservation=Reservation::find($id);
		return view('admin.reservation.edit',['reservation'=>$reservation,'room'=>$room]);
	}
	public function EditPost(Request $request,$id)
	{
		$this->validate($request,
        [
            'idRoom'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'DateIn'=>'required',
            'DateOut'=>'required',
            'Numbers'=>'required',
            'Notes'=>'required',
            
        ],
        [   

            'idRoom.required'=>"Bạn chưa nhập tên phòng",
            'name.required'=>"Bạn chưa nhập tên khách hàng",
            'phone.required'=>"Bạn chưa nhập số điện thoại",
            'email.required'=>"Bạn chưa nhập email",
            'DateIn.required'=>"Bạn chưa nhập ngày đến",
            'DateOut.required'=>"Bạn chưa nhập ngày đi",
            'Numbers.required'=>"Bạn chưa nhập số lượng",
            'Notes.required'=>"Bạn chưa nhập Notes",

           
        ]);
        
        $reservation=Reservation::find($id);
       // $reservation->link=$request->link;
        
        $reservation->idRoom=$request->idRoom;
        $reservation->name=$request->name;
        $reservation->phone=$request->phone;
        $reservation->email=$request->email;
        $reservation->DateIn=$request->DateIn;
        $reservation->DateOut=$request->DateOut;
        $reservation->Numbers=$request->Numbers;
        $reservation->Notes=$request->Notes;

      
       
    
        $reservation->save(); 


        return redirect('admin/reservation/list')->with('annoucement','Sửa thông tin reservation thành công');
      
	}

    public function Add()
    {
        
        $room=Room::all();
        return view('admin.reservation.add',['room'=>$room]);
    }
    public function AddPost(Request $request)
    {
     $this->validate($request,
        [
            'idRoom'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'DateIn'=>'required',
            'DateOut'=>'required',
            'Numbers'=>'required',
            'Notes'=>'required',
            
        ],
        [   

            'idRoom.required'=>"Bạn chưa nhập tên phòng",
            'name.required'=>"Bạn chưa nhập tên khách hàng",
            'phone.required'=>"Bạn chưa nhập số điện thoại",
            'email.required'=>"Bạn chưa nhập email",
            'DateIn.required'=>"Bạn chưa nhập ngày đến",
            'DateOut.required'=>"Bạn chưa nhập ngày đi",
            'Numbers.required'=>"Bạn chưa nhập số lượng",
            'Notes.required'=>"Bạn chưa nhập Notes",

           
        ]);
        
        $roomtaken=Room::where('id',$request->idRoom)->get();
        $roomtaken[0]->Status=0;
        $roomtaken[0]->save();

        $reservation=new Reservation;
       // $reservation->link=$request->link;
        
        $reservation->idRoom=$request->idRoom;
        $reservation->name=$request->name;
        $reservation->phone=$request->phone;
        $reservation->email=$request->email;
        $reservation->DateIn=$request->DateIn;
        $reservation->DateOut=$request->DateOut;
        $reservation->Numbers=$request->Numbers;
        $reservation->Notes=$request->Notes;

        $reservation->save(); 

        $r=Room::find($reservation->idRoom);
        $cate=CategoryRoom::find($r->idCategory);
       
        $day= (strtotime($reservation->DateOut) - strtotime($reservation->DateIn))/60/60/24;
        $bill=new DetailBill;
        $bill->content='Tiền phòng';
        $bill->price= $cate->price*$day;
        $bill->idReservation=$reservation->id;
        $bill->save();  


        return redirect('admin/reservation/list')->with('annoucement','Thêm reservation thành công');
      
    }
    public function Delete($id)
    {   
        $bill=DetailBill::where('idReservation',$id)->get();
        foreach ($bill as $b) {
            $b->delete();
        }

        $reservation=Reservation::find($id);
        $room=Room::find($reservation->idRoom);
        $room->Status=1;
        $room->save();
        $reservation->delete();
        return redirect('admin/reservation/list')->with('annoucement','Xóa reservation thành công');
     }

}	
 ?>