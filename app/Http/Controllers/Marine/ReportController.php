<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{

    public function inquiryDownloadPdf(Request $request){

       // dd('hi');
        $filter = $request->filter;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $inquiries = Inquiry::getInquiryList2($filter);
    //dd($inquiries);
         $pdf = Pdf::loadView('report.inquiryPdf', compact('inquiries'))
                 ->setPaper('a4', 'landscape');

        return $pdf->download('inquiry-report.pdf');
    }

    public function chassisWiseDownloadPdf(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $inquiries = Inquiry::getInquiryList($from_date, $to_date);

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('report.inquiryPdf', [
            'inquiries' => $inquiries,
        ])->setPaper('a4', 'landscape');

        $fileName = $from_date ? 'inquiry-' . $from_date . '.pdf': 'inquiry.pdf';

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
                $inquiry->product_type,
                $inquiry->start,
                $inquiry->engine_type,
                $inquiry->model,
                $inquiry->purchase_date,
                $inquiry->customer_type,
                $inquiry->project_status,
                $inquiry->status,
                $inquiry->vessel_name,
                $inquiry->builder_details,
                $inquiry->description,
            ]);
        }

        fclose($file);
        exit;
    }
}
