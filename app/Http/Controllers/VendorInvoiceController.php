<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorInvoiceController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return "Index method from VIC";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $party = null;
        return view("vendor-invoice.create", compact('party'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {

        $party = DB::table('parties')
            ->where('party_type', 'vendor')
            ->where(['fullname' => $request->fullname, 'phone_number' => $request->phone_number])
            ->first();
        if (!empty($party)) {
            $party_id = $party->id;
        } else {
            # Create vendor invoice
            $param = array(
                'party_type' => 'vendor',
                'fullname' => $request->fullname,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'account_holder_name' => $request->account_holder_name,
                'account_number' => $request->account_number,
                'bank_name' => $request->bank_name,
                'ifsc_code' => $request->ifsc_code,
                'branch_address' => $request->branch_address
            );
            $party_id = DB::table('parties')->insertGetId($param);
        }

        # Create vendor invoice
        $param = array(
            'party_id' => $party_id,
            'invoice_number' => $request->invoice_number,
            'invoice_date' => $request->invoice_date,
            'account_holder_name' => $request->account_holder_name,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'ifsc_code' => $request->ifsc_code,
            'branch_address' => $request->branch_address,
            'item_description' => $request->item_description,
            'total_amount' => $request->total_amount,
            'declaration' => $request->declaration,
            'created_at' => date("Y-m-d H:i:s")
        );

        $invoiceId = DB::table('vendor_invoices')->insertGetId($param);
        if ($invoiceId) {
            return redirect()->route('vendor-invoice.show', $invoiceId);
        } else {
            return redirect()->back()->withError('Something went wrong, please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $invoiceId = $id;
        $invoice = DB::table('vendor_invoices as vi')
            ->join('parties as p', 'vi.party_id', '=', 'p.id')
            ->where('vi.id', $invoiceId)->first();

        // echo '<pre>';
        // var_dump($invoice);
        // echo '</pre>';
        // exit;

        return view('vendor-invoice.print', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
