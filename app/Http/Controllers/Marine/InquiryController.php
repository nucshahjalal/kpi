<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\{Inquiry, Visit};

class InquiryController extends Controller
{
    public $data = array();

    public function index(Request $request){

        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $this->data['inquiries'] = Inquiry::getInquiryList($from_date, $to_date);
        return view('marine.inquiry.index', $this->data);
    }

    public function warmList(Request $request){

        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $this->data['inquiries'] = Inquiry::getWarmList($from_date, $to_date);
        return view('marine.inquiry.warmList', $this->data);
    }

    public function coldList(Request $request){

        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $this->data['inquiries'] = Inquiry::getColdList($from_date, $to_date);
        return view('marine.inquiry.coldList', $this->data);
    }

    public function hotList(Request $request){

        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $this->data['inquiries'] = Inquiry::getHotList($from_date, $to_date);
        return view('marine.inquiry.hotList', $this->data);
    }

    public function createForm(Request $request){

        return view('marine.inquiry.create');
    }

    public function store(Request $request)
    {
       
        $request->validate([
           'company_name' => ['required',],
           'product_type' => ['required',],
           'engine_type' => ['required',],
           'customer_type' => ['required',],
           'project_status' => ['required',],
           'status' => ['required',],
        ], [
            'company_name.required'   => 'Company name is required.',
            'product_type.required'   => 'Product type is required.',
            'engine_type.required'   => 'Engine type  is required.',
            'customer_type.required'   => 'Customer type is required.',
            'project_status.required'   => 'Project status is required.',
            'status.required'   => 'Inquiry status is required.',
        ]);
        
        $request->merge([
            'userid' => auth()->user()->id,
        ]);
        $request->merge([
            'date' => now()->format('Y-m-d H:i:s'),
        ]);

        $inquiry  = Inquiry::create($request->all());
        if($inquiry){
            return redirect('inquiry/list')->with('success','Inquiry create successfull');
        }else{
            return redirect('inquiry/create')->with('error','Inquiry create failed');
        }
    }

    public function editForm(string $id)
    { 
        $this->data['inquiry'] = Inquiry::find($id);
        return view('marine.inquiry.edit', $this->data);
    }

    public function update(Request $request)
    {
    
        $inquiry = Inquiry::findOrFail($request->id);

        $request->validate([
           'company_name' => ['required',],
           'product_type' => ['required',],
           'engine_type' => ['required',],
           'customer_type' => ['required',],
           'project_status' => ['required',],
           'status' => ['required',],
        ], [
            'company_name.required'   => 'Company name is required.',
            'product_type.required'   => 'Product type is required.',
            'engine_type.required'   => 'Engine type  is required.',
            'customer_type.required'   => 'Customer type is required.',
            'project_status.required'   => 'Project status is required.',
            'status.required'   => 'Inquiry status is required.',
        ]);

        $inquiry->fill($request->all());
        
        if($inquiry->update()){
            return redirect('inquiry/list')->with('success','Inquiry update successfull');
        }else{
            return redirect('inquiry/edit/',$request->id)->with('error','Inquiry update failed');
        }
    }

    public function view(string $id)
    { 
        $this->data['inquiry'] = Inquiry::find($id);
        return view('marine.inquiry.view', $this->data);
    }

    public function destroy( $id)
    {
        $inquiry  = Inquiry::find($id);
        if($inquiry->delete()){
            return redirect('inquiry/list')->with('success','Inquiry delete successfull');
        }else{
            return redirect('inquiry/list')->with('error','Inquiry delete failed');
        }
    } 

    public function visitList(Request $request){

        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $this->data['visits'] = Visit::getVisitList($from_date, $to_date);
        return view('marine.inquiry.visitList', $this->data);
    }

    public function insertVisitData(Request $request)
    {
        $validated = $request->validate([
            'inquiry_id' => 'required|exists:inquiries,id',
            'details' => 'required|string|max:255', 
        ]);

        $data = [
            'inquiry_id' => $request->inquiry_id,
            'details' => $request->details,
            'userid' => auth()->user()->id, 
        ];

        $visit = Visit::create($data); 

        if($visit) {
            return redirect('inquiry/list')->with('success', 'Check-in successful');
        } 
    }
    
    
}
