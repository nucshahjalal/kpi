<?php

namespace App\Http\Controllers\Kpi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\{Inquiry, Visit};
use Carbon\Carbon;
use App\Models\User;
use App\Models\Criteria;
use App\Models\Employee;
use DB;

class EmployeeController extends Controller
{
    public $data = array();

    public function approvedList(Request $request){

        $this->data['defaultFrom'] = request('from_date') ?? Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->data['defaultTo'] = request('to_date') ?? Carbon::now()->format('Y-m-d');

        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $this->data['inquiries'] = Inquiry::getInquiryList($from_date, $to_date);
        return view('kpi.employee.approve', $this->data);
    }

    public function rejectedList(Request $request){

        $this->data['defaultFrom'] = request('from_date') ?? Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->data['defaultTo'] = request('to_date') ?? Carbon::now()->format('Y-m-d');

        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $this->data['inquiries'] = Inquiry::getInquiryList($from_date, $to_date);
        return view('kpi.employee.reject', $this->data);
    }

    public function kpiRegister()
    {
        //dd('hi');
        //$users = User::all();
        return view('kpi.employee.KpiRegister');
    }
    
   public function storeCriteria(Request $request)
    {
       
        $kpiData = json_decode($request->kpi_data, true);

        if (empty($kpiData)) {
            return back()->with('error', 'Please add at least one criteria.');
        }

        try {
            DB::transaction(function () use ($request, $kpiData) {
                
                $employee = Employee::create([
                    'staff_id'         => $request->staff_id,
                    'full_name'        => $request->full_name,
                    'team'             => $request->team,
                    'designation'      => $request->designation,
                    'portfolio_status' => $request->portfolio_status,
                    'supervisor_name'  => $request->supervisor_name,
                    'supervisor_id'    => $request->supervisor_id,
                ]);

                foreach ($kpiData as $item) {
                    Criteria::create([
                        'emp_id'      => $employee->id, 
                        'label_name'  => $item['label'],
                        'criteria'    => $item['criteria'],
                        'weight'      => $item['weight'],
                        'target'      => $item['target'] ?? 0,
                        'actual'      => $item['actual'] ?? 0,
                        'score'       => $item['score'] ?? 0,
                    ]);
                }
            });

            return redirect()->back()->with('success', 'Employee and Criteria saved successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // popup thake data insert korar janno
   public function storeCriteria2(Request $request)
    {
        $label = $request->label;
        $items = $request->items; 

        try {
            foreach ($items as $item) {
                DB::table('criterias')->insert([
                    'label_name' => $label,
                    'criteria'   => $item['criteria'],
                    'weight'     => $item['weight'],
                //  'created_at' => now(), 
                    //'updated_at' => now(),
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Data inserted successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    
}
