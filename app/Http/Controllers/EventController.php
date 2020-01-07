<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Event;
class EventController extends Controller
{
	public function getEvent()
	{
		$event=Event::all();
		return view('admin.event.list',['event'=>$event]);
	}
	public function Edit($id)
	{
		$event=Event::find($id);
		return view('admin.event.edit',['event'=>$event]);
	}
	public function EditPost(Request $request,$id)
	{
		$this->validate($request,
        [
            'name'=>'required',
            'body'=>'required',
            'image'=>'required',
            
            
        ],
        [   
            'name.required'=>"Bạn chưa nhập tên sự kiện",
            'body.required'=>"Bạn chưa nhập nội dung",
            'image.required'=>"Bạn chưa nhập image",
            
            
           

        ]);
        
        $event=Event::find($id);
        
       $event->name=$request->name;
        $event->body=$request->body;
        $event->image="images/" . $request->image->getClientOriginalName();
       
    
        $event->save(); 


        return redirect('admin/event/list')->with('annoucement','Sửa thông tin event thành công');
      
	}

    public function Add()
    {
        return view('admin.event.add');
    }
    public function AddPost(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required',
            'body'=>'required',
            'image'=>'required',
            
        ],
        [   
            'name.required'=>"Bạn chưa nhập tên sự kiện",
            'body.required'=>"Bạn chưa nhập nội dung",
            'image.required'=>"Bạn chưa nhập image",
           
        ]);

        $event=new Event;
        $event->name=$request->name;
        $event->body=$request->body;
        $event->image="images/" . $request->image->getClientOriginalName();
       
    
        $event->save(); 


        return redirect('admin/event/list')->with('annoucement','Thêm event thành công');
    }
    public function Delete($id)
    {
        $event=Event::find($id);
        $event->delete();
         return redirect('admin/event/list')->with('annoucement','Xóa event thành công');
     }

}	
 ?>