<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;
use App\User;
use App\Charts\yearlyReport;
use Excel;
use App\Exports\InvoicesExport;
use App\DetailBill;
use App\Reservation;
class UserController extends Controller
{
    
    public function getDangNhapAdmin()
    {
        return view('admin.login');
    }

    public function postDangNhapAdmin(Request $request)
    {
        $this->validate($request,
        [
            
            'name'=>'required',
            'password'=>'required',
        ],
        [
            'password.required'=>'Bạn chưa nhập password',
            'name.required'=>'Bạn chưa nhập tên',
                       
        ]);
      if (Auth::attempt(['name'=>$request->name,'password'=>$request->password]))

        {
            return redirect('admin/information/list')->with('annoucement','Đăng nhập thành công');
        }
        else {
            return redirect('admin/login')->with('annoucement','Đăng nhập thất bại');
        }
    }

    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('admin/login');
    }

    public function ExportBill()
    {
        $data=['name'=>'Huynh Tan Duy'];
        $pdf = PDF::loadview('pages.export_bill',compact('data'));

        return $pdf->download('export_bill.pdf');
    }

    public function Report()
    {
        $chart=new yearlyReport;
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('My dataset', 'bar', [1, 2, 3, 4]);
        //$chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);

        return view('pages.report', ['chart' => $chart]);
    }

    public function monthReport()
    {
        $chart=new yearlyReport;
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('My dataset', 'bar', [1, 2, 3, 4]);
        //$chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);

        return view('pages.monthReport', ['chart' => $chart]);
    }

    public function exportInvoice($idReservation)
    {
        $detail_bill= DetailBill::where('idReservation', $idReservation)->get();
        $sum=0;
        foreach ($detail_bill as $item) {
            $sum += $item->price;
        }
        $reservation = Reservation::find($idReservation);
        $reservation->total_bill=$sum;
        $reservation->status=1;
        $reservation->save();


        return Excel::download(new InvoicesExport($idReservation), 'invoices.xlsx');
    }

}

