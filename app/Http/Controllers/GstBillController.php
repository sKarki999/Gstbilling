<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\GstBill;
use Illuminate\Http\Request;

class GstBillController extends Controller {


    public function __construct() {
        $this->middleware('auth');
    }

    public function createGstBill() {

        //Fetching data from the joined tables
        $parties = Party::where('party_type', 'client')->orderBy('fullname')->get();
        return view('gst.creategstbill', compact('parties'));
    }

    public function saveGstBill(Request $request) {

        $request->validate([
            'party_id'          => 'required',
            'invoice_data'      => 'required',
            'invoice_number'    => 'required',
            'item_description'  => 'required',
            'total_amount'      => 'required',
            'tax_percentage'    => 'required',
            'net_amount'        => 'required',
            'declaration'       => 'required'
        ]);

        $param = $request->all();
        unset($param['_token']);
        GstBill::create($param);

        return redirect()->route('manage-gst-bill')->withStatus('Bill created successfully');
    }

    public function manageGstBill() {
        // $bills = GstBill::with('party')->get();
        $bills = GstBill::where('is_deleted', 0)->with('party')->get();
        return view('gst.managebill', compact('bills'));
    }

    public function printGstBill(int $id) {
        $bill = GstBill::where('id', $id)->with('party')->first();
        return view('gst.printbill', compact('bill'));
    }
}
