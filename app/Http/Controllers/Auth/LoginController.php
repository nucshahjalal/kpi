<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class LoginController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('auth.login',compact('employees'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'staff_id' => 'required',
        ], [
            'staff_id.required' => 'User ID is required',
        ]);

        $employee = Employee::where('staff_id', $request->staff_id)->first();

        if ($employee) {
           
            Auth::login($employee);

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'staff_id' => 'Invalid User ID Or Password',
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
