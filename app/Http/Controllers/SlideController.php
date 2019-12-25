<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Slide;
class SlideController extends Controller
{
	public function getSlide()
	{
		$slide=Slide::all();
		return view('admin.slide.list',['slide'=>$slide]);
	}
	public function Edit($id)
	{
		$slide=Slide::find($id);
		return view('admin.slide.edit',['slide'=>$slide]);
	}
	public function EditPost(Request $request,$id)
	{
		$this->validate($request,
        [
            
            'caption'=>'required',
            
        ],
        [   
            
            'caption.required'=>"Bạn chưa nhập caption hình ảnh",
           
        ]);
        
        $slide=Slide::find($id);
       // $slide->link=$request->link;
        $slide->caption=$request->caption;
        $slide->link="images/" . $request->image->getClientOriginalName();
       
    
        $slide->save(); 


        return redirect('admin/slide/list')->with('annoucement','Sửa thông tin slide thành công');
      
	}

    public function Add()
    {
        return view('admin.slide.add');
    }
    public function AddPost(Request $request)
    {
       $this->validate($request,
        [
            'link'=>'required',
            'caption'=>'required',
            
        ],
        [   
            'link.required'=>"Bạn chưa nhập link hình ảnh",
            'caption.required'=>"Bạn chưa nhập caption hình ảnh",
           
        ]);
        
        $slide=new Slide;
        $slide->link=$request->link;
        $slide->caption=$request->caption;
      
       
    
        $slide->save(); 


        return redirect('admin/slide/list')->with('annoucement','Thêm slide thành công');
      
    }
    public function Delete($id)
    {
        $slide=Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/list')->with('annoucement','Xóa slide thành công');
     }

}	
 ?>