<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Inquiry, Visit};
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

    public function inquiryHotDownloadPdf(Request $request)
    {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        $inquiries = Inquiry::getHotList($from_date, $to_date);
        $pdf = Pdf::loadView('report.hotPdf', compact('inquiries'))->setPaper('a4', 'landscape');
        $fileName = $from_date ? 'inquiry-hot' . $from_date . '-to-' . $to_date . '.pdf' : 'inquiry-hot.pdf';
        return $pdf->download($fileName);
    }

    public function inquiryColdDownloadPdf(Request $request)
    {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        $inquiries = Inquiry::getColdList($from_date, $to_date);
        $pdf = Pdf::loadView('report.coldPdf', compact('inquiries'))->setPaper('a4', 'landscape');
        $fileName = $from_date ? 'inquiry-cold' . $from_date . '-to-' . $to_date . '.pdf' : 'inquiry-cold.pdf';
        return $pdf->download($fileName);
    }

    public function inquiryWarmDownloadPdf(Request $request)
    {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        $inquiries = Inquiry::getWarmList($from_date, $to_date);
        $pdf = Pdf::loadView('report.warmPdf', compact('inquiries'))->setPaper('a4', 'landscape');
        $fileName = $from_date ? 'inquiry-warm' . $from_date . '-to-' . $to_date . '.pdf' : 'inquiry-warm.pdf';
        return $pdf->download($fileName);
    }

    public function checkinDownloadPdf(Request $request)
    {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        $inquiries = Visit::getVisitList($from_date, $to_date);
        $pdf = Pdf::loadView('report.visitCheckinPdf', compact('inquiries'))->setPaper('a4', 'landscape');
        $fileName = $from_date ? 'check-in' . $from_date . '-to-' . $to_date . '.pdf' : 'check-in.pdf';
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

    public function inquiryHotDownloadExcel(Request $request)
    {
        $fileName = 'inquiry-hot.xls';  

        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $inquiries = Inquiry::getHotList($from_date, $to_date);

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

    public function inquiryColdDownloadExcel(Request $request)
    {
        $fileName = 'inquiry-cold.xls';  

        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $inquiries = Inquiry::getColdList($from_date, $to_date);

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

    public function inquiryWarmDownloadExcel(Request $request)
    {
        $fileName = 'inquiry-warm.xls';  

        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $inquiries = Inquiry::getWarmList($from_date, $to_date);

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

    public function checkinDownloadExcel(Request $request)
    {
        $fileName = 'check-in.xls';  

        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $visits = Visit::getVisitList($from_date, $to_date);

        header('Content-Type: text/csv; charset=UTF-8');
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $file = fopen('php://output', 'w');
        
        fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($file, []);
        fputcsv($file, [
            'Company Name', 'Owner Name','Phone','Engine Type',
            'Vessel Name','Visit Details','User Name','Visit Count','Check-In Date'
        ]);
        
        foreach ($visits as $visit) {
            fputcsv($file, [
                $visit->company_name,
                $visit->name,
                $visit->phone,
                $visit->engine_type == 0 ? 'Mitshubishi' : 'Yuchai',
                $visit->vessel_name,
                $visit->details,
                $visit->user_name,
                $visit->visit_count,
                date('m-d-Y', strtotime($visit->created_at)),
            ]);
        }

        fclose($file);
        exit;
    }
}


