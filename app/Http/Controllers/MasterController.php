<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Alert;

class MasterController extends Controller
{
    public function clientMaster()
    {
        $listCustomer = DB::table('tbl_customers')->get();
        return view('clientLists',compact('listCustomer'));
    }

    public function doAddCustomer(Request $request){
   
        $data = $request->all();

        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:100',
            'customer_email' => 'required|string|email|max:100',
            'customer_mobile_no' => 'required|numeric',
            'address' => 'nullable|string|max:255',
            'country' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'city' => 'required|string|max:100',
        ]);
        // Remove the _token field from the request data
        $data = $request->except('_token');
        // Insert data into the database using DB::table
        $now = Carbon::now()->toDateTimeString();
        $data['created_at'] = $now; // Add created_at timestamp
        $data['created_by'] = Auth::guard('admin')->User()->user_id; // Add updated_at timestamp
        DB::table('tbl_customers')->insert($data);

        Alert::success('Added Client Successfully');
        return redirect()->back();
    }


    public function editClientDetails(Request $request,$id)
    {
        $customer = DB::table('tbl_customers')->where('id','=',$id)->first();
        return view('editClient',compact('customer'));
    }


    public function doCustomerUpdate(Request $request){
   
        $data = $request->all();
        $customer_id = $data['customer_id'];
        $data = $request->except(['_token', 'customer_id']);

        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:100',
            'customer_email' => 'required|string|email|max:100',
            'customer_mobile_no' => 'required|numeric',
            'address' => 'nullable|string|max:255',
            'country' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'city' => 'required|string|max:100',
        ]);
        // Remove the _token field from the request data
   
   
        // Insert data into the database using DB::table
        $now = Carbon::now()->toDateTimeString();
        $data['updated_at'] = $now; // Add created_at timestamp
        DB::table('tbl_customers')->where('id', '=', $customer_id)->update($data);

        Alert::success('Client Details Updated Successfully');
        return redirect()->route('clientMaster');
    }

}
