<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InquiryController extends Controller
{
    public $data = array();

    public function index(Request $request){

        return view('marine.inquiry.index');
    }

    public function createForm(Request $request){
        return view('marine.inquiry.create');
    }

    
}
