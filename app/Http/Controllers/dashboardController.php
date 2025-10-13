<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Employee, Product, Current};
use DB;

class dashboardController extends Controller
{
    public $data = array();

    public function dashboard(Request $request){

        return view('backend.dashboard');
    }
}
