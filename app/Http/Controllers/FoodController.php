<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Food;
use App\CategoryFood;
class FoodController extends Controller
{
    public function getFood()
    {
        $food=Food::all();
        return view('admin.food.list',['food'=>$food]);
    }
    public function Edit($id)
    {
        $categoryFood=CategoryFood::all();
        $food=Food::find($id);
        return view('admin.food.edit',['food'=>$food,'categoryFood'=>$categoryFood]);
    }
    public function EditPost(Request $request,$id)
    {
        $this->validate($request,
        [
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            
            
        ],
        [   
            'name.required'=>"Bạn chưa nhập tên món ăn",
            'description.required'=>"Bạn chưa nhập miêu tả món ăn",
            'price.required'=>"Bạn chưa nhập giá",

           
        ]);
        
        $food=Food::find($id);
        $food->name=$request->name;
        $food->description=$request->description;
        $food->price=$request->price;
        $food->idCategory=$request->idCategory;
      
       
    
        $food->save(); 


        return redirect('admin/food/list')->with('annoucement','Sửa thông tin món ăn thành công');
      
    }

    public function Add()
    {
        $categoryFood=CategoryFood::all();
        return view('admin.food.add',['categoryFood'=>$categoryFood]);
    }
    public function AddPost(Request $request)
    {
       $this->validate($request,
        [
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            
            
        ],
        [   
            'name.required'=>"Bạn chưa nhập tên món ăn",
            'description.required'=>"Bạn chưa nhập miêu tả món ăn",
            'price.required'=>"Bạn chưa nhập giá",

           
        ]);
        
        $food=new Food;
        $food->name=$request->link;
        $food->description=$request->caption;
        $food->price=$request->link;
        $food->idCategory=$request->idCategory;
      
       
    
        $food->save(); 


        return redirect('admin/food/list')->with('annoucement','Thêm món ăn thành công');
      
      
    }
    public function Delete($id)
    {
        $food=Food::find($id);
        $food->delete();
        return redirect('admin/food/list')->with('annoucement','Xóa món ăn thành công');
     }

}   
 ?>