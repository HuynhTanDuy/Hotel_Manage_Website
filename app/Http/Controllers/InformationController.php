<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Information;
class InformationController extends Controller
{
	public function getInformation()
	{
		$information=Information::all();
		return view('admin.information.list',['information'=>$information]);
	}
	public function edit()
	{
		$information=Information::find(0);
		return view('admin.information.edit',['information'=>$information]);
	}
	public function editPost(Request $request)
	{
		 $this->validate($request,
        [
            'name'=>'required',
            'email'=>'required',
            'phone_number'=>'required',
            'slogan'=>'required',
            'address'=>'required',
            
        ],
        [
            'name.required'=>"Bạn chưa nhập tên",
            'email.required'=>"Bạn chưa nhập email",
            'phone_number.required'=>"Bạn chưa nhập số điện thoại",
            'slogan.required'=>"Bạn chưa nhập slogan",
            'address.required'=>"Bạn chưa nhập địa chỉ",
           

        ]);
        
        $information=Information::find(0);
        $information->name=$request->name;
        $information->email=$request->email;
        $information->phone_number=$request->phone_number;
        $information->slogan=$request->slogan;
        $information->address=$request->address;    
        $information->save(); 


        return redirect('admin/information/list')->with('annoucement','Sửa thông tin khách sạn thành công');
      
	}
}	
 ?>