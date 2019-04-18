<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Room;
use App\CategoryRoom;
class RoomController extends Controller
{
	public function getRoom()
	{
		$room=Room::all();
		return view('admin.room.list',['room'=>$room]);
	}
	public function Edit($id)
	{
        $categoryRoom=CategoryRoom::all();
		$room=Room::find($id);
		return view('admin.room.edit',['room'=>$room,'categoryRoom'=>$categoryRoom]);
	}
	public function EditPost(Request $request,$id)
	{
		$this->validate($request,
        [
            
            'name'=>'required',
            'idCategory'=>'required',
            'status'=>'required',
            
        ],
        [   
            
            'name.required'=>"Bạn chưa nhập tên phòng",
            'idCategory.required'=>"Bạn chưa nhập loại phòng",
            'status.required'=>"Bạn chưa nhập tình trạng phòng",
           
        ]);
        
        $room=Room::find($id);
       // $room->link=$request->link;
        $room->name=$request->name;
        $room->idCategory=$request->idCategory;
        $room->Status=$request->status;
      
       
    
        $room->save(); 


        return redirect('admin/room/list')->with('annoucement','Sửa thông tin room thành công');
      
	}

    public function Add()
    {
        $categoryRoom=CategoryRoom::all();
        return view('admin.room.add',['categoryRoom'=>$categoryRoom]);
    }
    public function AddPost(Request $request)
    {
      $this->validate($request,
        [
            
            'name'=>'required',
            'idCategory'=>'required',
            'status'=>'required',
            
        ],
        [   
            
            'name.required'=>"Bạn chưa nhập tên phòng",
            'idCategory.required'=>"Bạn chưa nhập loại phòng",
            'status.required'=>"Bạn chưa nhập tình trạng phòng",
           
        ]);
        
        $room=new Room;
       // $room->link=$request->link;
        $room->name=$request->name;
        $room->idCategory=$request->idCategory;
        $room->Status=$request->status;
      
       
    
        $room->save(); 


        return redirect('admin/room/list')->with('annoucement','thêm room thành công');
      
      
    }
    public function Delete($id)
    {
        $room=Room::find($id);
        $room->delete();
        return redirect('admin/room/list')->with('annoucement','Xóa room thành công');
     }

}	
 ?>