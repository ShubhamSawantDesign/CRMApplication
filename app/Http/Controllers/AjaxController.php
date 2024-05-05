<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Alert;

class AjaxController extends Controller
{
    //
    public function updateCustomerStatus(Request $request)
    {
        // Retrieve data from the AJAX request
        $id = $request->id;
        $status = $request->status;

        // Update customer status in the database
        DB::table('tbl_customers')
            ->where('id','=',$id)
            ->update(['status' => $status]);

        // Prepare response
        $response = [
            'success' => true,
            'message' => 'Customer status updated successfully.'
        ];

        // Return JSON response
        return response()->json($response);
    }
}
