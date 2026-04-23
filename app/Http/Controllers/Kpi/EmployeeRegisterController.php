<?php

namespace App\Http\Controllers\Kpi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Criteria;
use App\Models\Employee;
use App\Models\Kpi;
use DB;

class EmployeeRegisterController extends Controller
{

    public function kpiRegister()
    {
        return view('kpi.employee.KpiRegister');
    }
    
    public function CriteriaStore(Request $request)
    {
        $kpiData = json_decode($request->kpi_data, true);

        if (empty($kpiData) || !isset($kpiData['kpi'])) {
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

                $allKpisToStore = [];
                foreach ($kpiData['kpi'] as $group) {
                    if (!isset($group['items']) || !is_array($group['items'])) {
                        continue;
                    }

                    $allKpisToStore[] = [
                        'label_name' => $group['label_name'] ?? '',
                        'type'       => $group['type'] ?? 0,
                        'all_items'  => $group['items'] 
                    ];
                }

                Kpi::create([
                    'emp_id' => $employee->id,
                    'items'  => $allKpisToStore, 
                ]);
            });

            return redirect('/dashboard')->with('success', 'All data stored in one row successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


   public function CriteriaStore_ok(Request $request)
    {
        $kpiData = json_decode($request->kpi_data, true);

        if (empty($kpiData) || !isset($kpiData['kpi'])) {
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

                foreach ($kpiData['kpi'] as $group) {
                    if (!isset($group['items']) || !is_array($group['items'])) {
                        continue;
                    }

                    $fullGroupData = [
                        'label_name' => $group['label_name'] ?? '',
                        'type'       => $group['type'] ?? '',
                        'all_items'  => $group['items'] 
                    ];

                    Kpi::create([
                        'emp_id' => $employee->id,
                        'items'  => $fullGroupData, 
                    ]);
                }
            });

            return redirect('/dashboard')->with('success', 'Data stored successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function CriteriaStore_main(Request $request)
    {
      // dd($request->all());
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
                        'type'        => $item['type'],
                        'criteria'    => $item['criteria'],
                        'weight'      => $item['weight'],
                        'target'      => $item['target'] ?? 0,
                        'actual'      => $item['actual'] ?? 0,
                        'score'       => $item['score'] ?? 0,
                    ]);
                }
            });

           // return redirect()->intended('/dashboard');
            return redirect('/dashboard')->with('success', 'Employee register successfully!');

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