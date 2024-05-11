<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QutationController extends Controller
{
    public function createQuatation(Request $request){

        $customers = DB::table('tbl_customers')->get();
        return view('createQutation',compact('customers'));

    }
}
