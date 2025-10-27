<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Inquiry, Visit};
use Carbon\Carbon;
use DB;

class dashboardController extends Controller
{
    public $data = array();

    public function dashboard(Request $request){
        
       $this->data['defaultFrom'] = request('from_date') ?? Carbon::now()->startOfMonth()->format('Y-m-d');
       $this->data['defaultTo'] = request('to_date') ?? Carbon::now()->format('Y-m-d');

        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        
        //product type = 0 (Engine)
        $this->data['total_inquries'] = Inquiry::where('product_type', 0)->whereBetween('created_at', [
            $from_date ?? Carbon::now()->startOfMonth(), $to_date ?? Carbon::now()->endOfMonth(),])->count();
        $this->data['total_engine_hot'] = Inquiry::where('product_type', 0)->where('status', 0)->whereBetween('created_at', [
            $from_date ?? Carbon::now()->startOfMonth(), $to_date ?? Carbon::now()->endOfMonth(),])->count();
        $this->data['total_engine_warm'] = Inquiry::where('product_type', 0)->where('status', 1)->whereBetween('created_at', [
            $from_date ?? Carbon::now()->startOfMonth(), $to_date ?? Carbon::now()->endOfMonth(),])->count();
        $this->data['total_engine_cold'] = Inquiry::where('product_type', 0)->where('status', 2)->whereBetween('created_at', [
            $from_date ?? Carbon::now()->startOfMonth(), $to_date ?? Carbon::now()->endOfMonth(),])->count();

           
         $this->data['total_mitshubisi'] = Inquiry::where('engine_type', 0)->whereBetween('created_at', [
            $from_date ?? Carbon::now()->startOfMonth(), $to_date ?? Carbon::now()->endOfMonth(),])->count();
         $this->data['total_yuchai'] = Inquiry::where('engine_type', 1)->whereBetween('created_at', [
            $from_date ?? Carbon::now()->startOfMonth(), $to_date ?? Carbon::now()->endOfMonth(),])->count();
        
        //product type = 1 (Equipment)
        $this->data['total_equipment_inquries'] = Inquiry::where('product_type', 1)->whereBetween('created_at', [
            $from_date ?? Carbon::now()->startOfMonth(), $to_date ?? Carbon::now()->endOfMonth(),])->count();
        $this->data['total_equipment_hot'] = Inquiry::where('product_type', 1)->where('status', 0)->whereBetween('created_at', [
            $from_date ?? Carbon::now()->startOfMonth(), $to_date ?? Carbon::now()->endOfMonth(),])->count();
        $this->data['total_equipment_warm'] = Inquiry::where('product_type', 1)->where('status', 1)->whereBetween('created_at', [
            $from_date ?? Carbon::now()->startOfMonth(), $to_date ?? Carbon::now()->endOfMonth(),])->count();
        $this->data['total_equipment_cold'] = Inquiry::where('product_type', 1)->where('status', 2)->whereBetween('created_at', [
            $from_date ?? Carbon::now()->startOfMonth(), $to_date ?? Carbon::now()->endOfMonth(),])->count();
      
        //graph chart inquiry value
        $this->data['total_hot'] = Inquiry::where('status', 0)->whereBetween('created_at', [
            $from_date ?? Carbon::now()->startOfMonth(), $to_date ?? Carbon::now()->endOfMonth(),])->count();
        $this->data['total_warm'] = Inquiry::where('status', 1)->whereBetween('created_at', [
            $from_date ?? Carbon::now()->startOfMonth(), $to_date ?? Carbon::now()->endOfMonth(),])->count();
        $this->data['total_cold'] = Inquiry::where('status', 2)->whereBetween('created_at', [
            $from_date ?? Carbon::now()->startOfMonth(), $to_date ?? Carbon::now()->endOfMonth(),])->count();
        
        //graph chart product value
         $this->data['total_engine'] = Inquiry::where('product_type', 0)->whereBetween('created_at', [
            $from_date ?? Carbon::now()->startOfMonth(), $to_date ?? Carbon::now()->endOfMonth(),])->count();
         $this->data['total_equipment'] = Inquiry::where('product_type', 1)->whereBetween('created_at', [
            $from_date ?? Carbon::now()->startOfMonth(), $to_date ?? Carbon::now()->endOfMonth(),])->count();
        return view('backend.dashboard', $this->data);
    }
}
