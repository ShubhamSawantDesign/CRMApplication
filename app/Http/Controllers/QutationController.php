<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
use Alert;
use Helper;

class QutationController extends Controller
{
    public function createQuatation(Request $request)
    {

        $customers = DB::table('tbl_customers')->get();
        return view('createQutation', compact('customers'));
    }

    public function doCreateQuotation(Request $request)
    {
        $data = $request->all();
        $count = count($data['item']);


        $item = $request->input('item');
        $description = $request->input('description');
        $quantity = $request->input('quantity');
        $unit_price = $request->input('unit_price');
        $sub_cost = $request->input('sub_cost');
        $gst_rate = $request->input('gst_rate');
        $gst_amount = $request->input('gst_amount');
        $total_amount = $request->input('total_Cost');


        $invoice_id = DB::table('tbl_invoice_details')->insertGetId([
            'customer' => $data['customer'],
            'estimate_id' => $data['estimate'],
            'reference_id' => $data['reference'],
            'estimateDate' => $data['estimateDate'],
            'sales_person' => $data['sales_person'],
            'project_name' => $data['project_name'],
            'subject' => $data['subject'],
            'customer_note' => $data['customerNote'],
            'tnc' => $data['termsnconditions'],
            'sub_total_amount' => $data['sub_total_amount'],
            'total_gst_amount' => $data['gst_total_amount'],
            'final_amount' => $data['final_amount'],
            'created_by' => Auth::guard('admin')->User()->user_id,
            'created_at' => now(), // If you want to set created_at and updated_at timestamps
        ]);

        /** Insert Items Details */

        for ($i = 0; $i < $count; $i++) {

            DB::table('tbl_invoice_items')->insert([
                'invoice_id' => $invoice_id,
                'item' => $item[$i],
                'description' => $description[$i],
                'quantity' => $quantity[$i],
                'unit_price' => $unit_price[$i],
                'sub_cost' => $sub_cost[$i],
                'gst_rate' => $gst_rate[$i],
                'gst_amount' => $gst_amount[$i],
                'total_amount' => $total_amount[$i],
                'created_at' => now(),
                'created_by' => Auth::guard('admin')->User()->user_id,
            ]);
        }
        Alert::success('Quatation Created Successfully');
        return redirect('/listQutation');
    }

    public function listQutation(Request $request)
    {
        $data = $request->all();
        $invoice_Details = DB::table('tbl_invoice_details')
            ->join('tbl_customers', 'tbl_invoice_details.customer', '=', 'tbl_customers.id')
            ->select('tbl_customers.customer_name', 'tbl_invoice_details.*')
            ->get();

        return view('listQutation', compact('invoice_Details'));
    }

    public function generateQuotation($invoice_id)
    {

        $invoice_Details = DB::table('tbl_invoice_details')
            ->join('tbl_customers', 'tbl_invoice_details.customer', '=', 'tbl_customers.id')
            ->select('tbl_customers.customer_name', 'tbl_customers.address', 'tbl_invoice_details.*')
            ->where('tbl_invoice_details.id', '=', $invoice_id)
            ->first();

        $invoice_items = DB::table('tbl_invoice_items')->where('invoice_id', '=', $invoice_id)->get();
       
        $pdf = Pdf::loadView('quotation', compact('invoice_items', 'invoice_Details'));
        $pdf->set_paper('a4', 'portrait');
        return $pdf->stream();
    }
}
