<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Room;
use App\CategoryRoom;
class CategoryRoomController extends Controller
{
	public function getRoom()
	{
		$room=CategoryRoom::all();
		return view('admin.room_category.list',['category_room'=>$room]);
	}
	public function Edit($id)
	{
        //$categoryRoom=CategoryRoom::all();
		$room=CategoryRoom::find($id);
		return view('admin.room_category.edit',['category_room'=>$room]);
	}

	public function EditPost(Request $request,$id)
	{
		$this->validate($request,
        [
            
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            
        ],
        [   
            
            'name.required'=>"Bạn chưa nhập tên loại phòng",
            'price.required'=>"Bạn chưa nhập giá loại phòng",
            'description.required'=>"Bạn chưa nhập mô tả loại phòng",
           
        ]);
        
        $room=CategoryRoom::find($id);
       // $room->link=$request->link;
        $room->name=$request->name;
        $room->price=$request->price;
        $room->description=$request->description;
        if ($request->image) $room->image="images/" . $request->image->getClientOriginalName();
      
       
    
        $room->save(); 


        return redirect('admin/category_room/list')->with('annoucement','Sửa thông tin room thành công');
      
	}

    public function Add()
    {
        $categoryRoom=CategoryRoom::all();
        return view('admin.room_category.add',['categoryRoom'=>$categoryRoom]);
    }
    public function AddPost(Request $request)
    {
      $this->validate($request,
        [
            
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image' => 'required'
            
        ],
        [   
            
            'name.required'=>"Bạn chưa nhập tên loại phòng",
            'price.required'=>"Bạn chưa nhập giá loại phòng",
            'description.required'=>"Bạn chưa nhập mô tả loại phòng",
            'image.required'=>"Bạn chưa nhập ảnh",
           
        ]);
        
        $room=new CategoryRoom;
       // $room->link=$request->link;
        $room->name=$request->name;
        $room->price=$request->price;
        $room->description=$request->description;
        $room->image="images/" . $request->image->getClientOriginalName();
      
       
    
        $room->save(); 


        return redirect('admin/category_room/list')->with('annoucement','thêm loại phòng thành công');
      
      
    }
    public function Delete($id)
    {
        $room=CategoryRoom::find($id);
        $room->delete();
        return redirect('admin/category_room/list')->with('annoucement','Xóa loại phòng thành công');
     }

}	
 ?>