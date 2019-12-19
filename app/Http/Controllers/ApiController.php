<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\CategoryRoom;

use Illuminate\Support\Facades\Input;
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
}	
 ?>