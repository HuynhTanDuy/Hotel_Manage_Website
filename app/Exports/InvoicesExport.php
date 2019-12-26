<?php
namespace App\Exports;

use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\DetailBill;
use App\Reservation;
class InvoicesExport implements FromView
{	
	public $view;
	public $data;

	public function __construct($id = "")
	{
	    //$this->view = $view;
	    $this->id = $id;
	}


    public function view(): view
    {
        // return view('admin.bill.invoice', [
        //     'invoices' => Invoice::all()
        // ]);
        $bill= DetailBill::where('idReservation',$this->id)->get();
        $reservation = Reservation::where('id',$this->id)->get();
        return view('admin.bill.invoice')
        	   ->with('bill', $bill)
        	   ->with('reservation',$reservation);
        	   
    }
}