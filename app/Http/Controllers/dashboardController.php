<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Inquiry, Visit};
use DB;

class dashboardController extends Controller
{
    public $data = array();

    public function dashboard(Request $request){

        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        
        //product type = 0 (Engine)
        $this->data['total_inquries'] = Inquiry::all()->whereBetween('created_at', [$from_date, $to_date])->where('product_type', 0)->count();
        $this->data['total_engine_hot'] = Inquiry::all()->whereBetween('created_at', [$from_date, $to_date])->where('product_type', 0)->where('status', 0)->count();
        $this->data['total_engine_warm'] = Inquiry::all()->whereBetween('created_at', [$from_date, $to_date])->where('product_type', 0)->where('status', 1)->count();
        $this->data['total_engine_cold'] = Inquiry::all()->whereBetween('created_at', [$from_date, $to_date])->where('product_type', 0)->where('status', 2)->count();
        
        $this->data['total_mitshubisi'] = Inquiry::all()->whereBetween('created_at', [$from_date, $to_date])->where('engine_type', 0)->count();
        $this->data['total_yuchai'] = Inquiry::all()->whereBetween('created_at', [$from_date, $to_date])->where('engine_type', 1)->count();
       
        //product type = 1 (Equipment)
        $this->data['total_equipment_inquries'] = Inquiry::all()->whereBetween('created_at', [$from_date, $to_date])->where('product_type', 1)->count();
        $this->data['total_equipment_hot'] = Inquiry::all()->whereBetween('created_at', [$from_date, $to_date])->where('product_type', 1)->where('status', 0)->count();
        $this->data['total_equipment_warm'] = Inquiry::all()->whereBetween('created_at', [$from_date, $to_date])->where('product_type', 1)->where('status', 1)->count();
        $this->data['total_equipment_cold'] = Inquiry::all()->whereBetween('created_at', [$from_date, $to_date])->where('product_type', 1)->where('status', 2)->count();

        //graph chart inquiry value
        $this->data['total_hot'] = Inquiry::all()->whereBetween('created_at', [$from_date, $to_date])->where('status', 0)->count();
        $this->data['total_warm'] = Inquiry::all()->whereBetween('created_at', [$from_date, $to_date])->where('status', 1)->count();
        $this->data['total_cold'] = Inquiry::all()->whereBetween('created_at', [$from_date, $to_date])->where('status', 2)->count();
        
        //graph chart product value
        $this->data['total_engine'] = Inquiry::all()->whereBetween('created_at', [$from_date, $to_date])->where('product_type', 0)->count();
        $this->data['total_equipment'] = Inquiry::all()->whereBetween('created_at', [$from_date, $to_date])->where('product_type', 1)->count();
        return view('backend.dashboard', $this->data);
    }
}
