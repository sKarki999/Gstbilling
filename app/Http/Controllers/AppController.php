<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller {


    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('dashboard');
    }

    // function to soft delete
    public function delete($table, $id) {

        // return $table . " " . $id;
        $param = array('is_deleted' => 1);
        DB::table($table)->where('id', $id)->update($param);

        // Redirect back
        return redirect()->back()->withStatus('Record deleted successfully');
    }
}
