<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartyController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    // load add party view file
    public function addParty() {
        return view('party.add');
    }

    // function to store party
    public function saveParty(Request $request) {

        $request->validate([
            'fullname'                  => 'required',
            'phone_number'              => 'required',
            'address'                   => 'required',
            'account_holder_name'       => 'required',
            'account_number'            => 'required',
            'bank_name'                 => 'required',
            'ifsc_code'                 => 'required',
            'branch_address'            => 'required'
        ]);

        // get all from data
        $param = $request->all();
        // unset token field
        unset($param['_token']);
        // save to database
        Party::create($param);

        // redirect to party view with status key and success message
        return redirect()->route('manage-party')->withStatus('Party Created Successfully');

        // get all from data
        // $param = $request->all();
        // // unset token field
        // unset($param['token']);

        // // save to database
        // Party::create($param);

        // // redirect to party view with status key and success message
        // return redirect()->route('add-party')->withStatus('Party Created Successfully');

        // redirect to party view with userdefined key and success message
        // return redirect()->route('add-party')->with('success', 'Party Created Successfully');


    }

    public function manageParty() {

        // get all parties
        $parties = Party::all();

        //get specific parties
        // $parties = Party::select('id', 'party_type', 'fullname')->get();
        return view('party.manageparty', compact('parties'));
    }

    public function editParty($id) {

        $party = Party::find($id);
        return view("party.edit", compact('party'));
    }

    public function updateParty(int $id, Request $request) {

        $request->validate([
            'fullname'                 => 'required|string|min:2|max:20',
            'phone_number'              => 'required',
            'address'                   => 'required',
            'account_holder_name'       => 'required|string|min:2|max:20',
            'account_number'            => 'required',
            'bank_name'                 => 'required|max:255',
            'ifsc_code'                 => 'required|max:50',
            'branch_address'            => 'required|max:255',
        ]);

        // get all from data
        $param = $request->all();
        // unset token field
        unset($param['_token']);

        Party::where('id', $id)->update($param);
        return redirect()->route('manage-party')->withStatus('Party updated Successfully');
    }


    // public function deleteParty(int $id) {

    //     if ($party = Party::find($id)) {
    //         $party->delete();
    //         return redirect()->route('manage-party')->withStatus('Party deleted Successfully');
    //     } else {
    //         return redirect()->route('manage-party')->withStatus('Id not found');
    //     }
    // }

    public function deleteParty(Party $party) {

        $party->delete();
        return redirect()->route('manage-party')->withStatus('Party deleted Successfully');
    }
}
