<?php

namespace App\Http\Controllers\Kpi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Criteria;
use App\Models\Employee;
use DB;

class ReportController extends Controller
{
    public $data = array();


    public function employeeDownloadPdf(Request $request)
    {
      
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        $emp_id = $request->input('emp_id');
       
        $employee  = Employee::getSingleEmployee($emp_id)->first();
        $employees = Employee::getEmployeeList($employee->id);
        $pdf = Pdf::loadView('report.employeeReport', compact('employee','employees'))->setPaper('a4', 'landscape');
        $fileName = $from_date ? 'employee-' . $from_date . '-to-' . $to_date . '.pdf' : 'employee-result-view.pdf';
        return $pdf->download($fileName);
    }
    
   public function employeeDownloadPdf22(Request $request)
    {
      
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        $employee = Employee::latest()->first();
        $employees = Employee::getEmployeeList();
        $pdf = Pdf::loadView('report.employeeReport', compact('employee','employees'))->setPaper('a4', 'landscape');
        $fileName = $from_date ? 'employee-' . $from_date . '-to-' . $to_date . '.pdf' : 'employee.pdf';
        return $pdf->download($fileName);
    }

   

    
}
