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
       // dd('hi');
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

       // $employees = Employee::getEmployeeList($from_date, $to_date);
        $employee = Employee::latest()->first();
        $employees = Employee::getEmployeeList();
        $pdf = Pdf::loadView('report.employeeReport', compact('employee','employees'))->setPaper('a4', 'landscape');
        $fileName = $from_date ? 'employee-' . $from_date . '-to-' . $to_date . '.pdf' : 'employee.pdf';
        return $pdf->download($fileName);
    }

   

    
}
