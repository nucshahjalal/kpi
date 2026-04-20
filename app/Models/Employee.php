<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Criteria;
use App\Models\Employee;
use DB;

class Employee extends Authenticatable
{
    use HasFactory;use Notifiable;
    protected $guarded = [];

   public static function getEmployeeList()
    {
        return Employee::from('employees as E')
            ->join('criterias AS C', 'E.id', '=', 'C.emp_id') 
            ->select(
                'E.id',
                'E.full_name',
                'E.staff_id',
                'E.supervisor_name',
                'E.supervisor_id',
                'E.designation',
                'C.label_name',
                'C.criteria',
                'C.target',
                'C.score',
                'C.actual',
                'C.weight',
                'C.type' 
            )
            ->orderBy('C.type')
            ->orderBy('E.created_at', 'desc')
            ->get()
            ->groupBy('type'); // এখানে কালেকশন লেভেলে গ্রুপ করা হয়েছে
    }

}
