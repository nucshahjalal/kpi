<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public $data = array();

    public function index(Request $request){

        $filter = $request->filter;
        $this->data['inquiries'] = Inquiry::getInquiryList($filter);
        return view('marine.inquiry.index', $this->data);
    }

    public function createForm(Request $request){

        return view('marine.inquiry.create');
    }

    public function store(Request $request)
    {
       // dd($request->all());
        $request->validate([
           'company_name' => ['required',],
        ], [
            'company_name.required'   => 'Company Name id is required.',
        ]);
        
        // $request->merge([
        //     'date' => date('Y-m-d', strtotime('date')),
        // ]);
        $request->merge([
            'userid' => auth()->user()->id,
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
        ], [
            'company_name.required'   => 'Company Name id is required.',
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

    
}
