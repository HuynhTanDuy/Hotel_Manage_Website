<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\CategoryRoom;
use App\Room;
use App\Event;
use App\Reservation;
use App\DetailBill;
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
    public function getNews()
    {
        $data=Event::all();
        return response()->json([
            'code' => '200',
            'data' => $data
        ]);
    }
    public function getHistory(Request $request)
    {
      
        if ($request->has('email')){
            $reservation = Reservation::where('email', $request->input('email'))->get();
            $properties = [];
            foreach ($reservation as $array_item) {
                if (!is_null($array_item['id'])) {
                    $properties['id'] = $array_item['id'];
                    $properties['idRoom'] = $array_item['idRoom'];
                    $properties['DateIn'] = $array_item['DateIn'];
                    $properties['DateOut'] = $array_item['DateOut'];
                    $room = Room::where('id', $properties['idRoom'])->first();
                    $properties['roomName'] = $room['name'];
                    $idCategory = $room['idCategory'];
                    $properties['categoryRoomName'] = CategoryRoom::where('id', $idCategory)->first()['name'];
                    $properties['image'] = CategoryRoom::where('id', $idCategory)->first()['image'];
                    $properties['price'] = DetailBill::where('idReservation', $properties['id'])->first()['price'];
                }
            }
            return response()->json([
                'code' => '200',
                'data' => $properties
            ]);
        }
        else {
            $data = Reservation::all();
            return response()->json([
                'code' => '200',
                'data' => $data
            ]);
        }
       
    }

}	
?> 