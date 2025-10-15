<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{

    public $data = array();

    public function inquiryDownloadPdf(Request $request)
        {
            $from_date = $request->input('from_date');
            $to_date = $request->input('to_date');

            $inquiries = Inquiry::getInquiryList($from_date, $to_date);

            $pdf = Pdf::loadView('report.inquiryPdf', compact('inquiries'))->setPaper('a4', 'landscape');

            $fileName = $from_date ? 'inquiry-' . $from_date . '-to-' . $to_date . '.pdf' : 'inquiry.pdf';

            return $pdf->download($fileName);
        }

    public function inquiryDownloadExcel(Request $request)
    {
        $fileName = 'inquiry.xls';  

        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $inquiries = Inquiry::getInquiryList($from_date, $to_date);

        header('Content-Type: text/csv; charset=UTF-8');
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $file = fopen('php://output', 'w');
        
        fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($file, []);
        fputcsv($file, [
            'Company Name', 'Owner Name','Phone','Price','Project PBT',
            'Product Type','Start Date','Engine Type','Product Model','Purchase Date',
            'Customer Type','Project Status','Inquiry Date','Inquiry Status',
            'Vessel Name','Builder Details','Description'
        ]);
        
        foreach ($inquiries as $inquiry) {
            fputcsv($file, [
                $inquiry->company_name,
                $inquiry->name,
                $inquiry->phone,
                $inquiry->price,
                $inquiry->pbt,
                $inquiry->product_type == 0 ? 'Marine' : 'Marine Equipment',
                $inquiry->start,
                $inquiry->engine_type == 0 ? 'Mitshubishi' : 'Yuchai',
                $inquiry->model,
                $inquiry->purchase_date,
                $inquiry->customer_type == 0 ? 'Govt' : 'Private',
                $projectStatusText = 
                $inquiry->project_status == 0 ? 'Planning' :
                ($inquiry->project_status == 1 ? 'Ongoing' :
                ($inquiry->project_status == 2 ? 'Vessel Complete' :
                ($inquiry->project_status == 3 ? 'Repowering' :
                ($inquiry->project_status == 4 ? 'New Build' : 'Halt')))),
                $inquiry->projectStatusText,
                $inquiry->status == 0 ? 'HOT' : ($inquiry->status == 1 ? 'WARM' : 'COLD'),
                $inquiry->vessel_name,
                $inquiry->builder_details,
                $inquiry->description,
            ]);
        }

        fclose($file);
        exit;
    }
}
