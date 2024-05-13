<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Mpdf\Mpdf;
use Alert;

class QutationController extends Controller
{
    public function createQuatation(Request $request){

        $customers = DB::table('tbl_customers')->get();
        return view('createQutation',compact('customers'));

    }

    public function doCreateQuotation(Request $request){
        $data = $request->all();
        $count = count($data['item']);
        $item = $request->input('item');
        $quantity = $request->input('quantity');
        $cost = $request->input('cost');
        $total_Cost = $request->input('total_Cost');


        $invoice_id = DB::table('tbl_invoice_details')->insertGetId([
            'customer' => $data['customer'],
            'estimate_id' => $data['estimate'],
            'reference_id' => $data['reference'],
            'estimateDate' => $data['estimateDate'],
            'sales_person' => $data['sales_person'],
            'project_name' => $data['project_name'],
            'total_amount' => $data['total_amount'],
            'cgst' => $data['cgst'],
            'sgst' => $data['sgst'],
            'other_cost' => $data['other'],
            'final_amount' => $data['final_amount'],
            'created_by' => Auth::guard('admin')->User()->user_id ,
            'created_at' => now(), // If you want to set created_at and updated_at timestamps
        ]);

        /** Insert Items Details */
        
        for ($i = 0; $i < $count; $i++) {

            DB::table('tbl_invoice_items')->insert([
                'invoice_id' => $invoice_id,
                'item' => $item[$i],
                'quantity' => $quantity[$i],
                'cost' => $cost[$i],
                'total_cost' => $total_Cost[$i],
                'created_at' => now(),
                'created_by' => Auth::guard('admin')->User()->user_id,
            ]);

        }
        Alert::success('Quatation Created Successfully');
        return redirect('/listQutation');
    }

    public function listQutation(Request $request){
        $data = $request->all();
        $invoice_Details = DB::table('tbl_invoice_details')
        ->join('tbl_customers', 'tbl_invoice_details.customer', '=', 'tbl_customers.id')
        ->select('tbl_customers.customer_name', 'tbl_invoice_details.*')
        ->get();

         return view('listQutation',compact('invoice_Details'));
    }

    public function generateQuotation($invoice_id)
    {
        
        $invoice_Details = DB::table('tbl_invoice_details')
        ->join('tbl_customers', 'tbl_invoice_details.customer', '=', 'tbl_customers.id')
        ->select('tbl_customers.customer_name', 'tbl_invoice_details.*')
        ->where('tbl_invoice_details.id','=',$invoice_id)
        ->first();

        $invoice_items = DB::table('tbl_invoice_items')->where('invoice_id','=',$invoice_id)->get();
    
        $mpdf = new Mpdf();
        $html = view('quotation', compact('invoice_Details', 'invoice_items'))->render();
    
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

}
