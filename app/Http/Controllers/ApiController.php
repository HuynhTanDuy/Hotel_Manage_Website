<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\CategoryRoom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Room;

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
}	
 ?>