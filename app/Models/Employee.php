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

    public static function getSingleEmployee($emp_id) 
    {
        return self::from('employees as E')
            ->leftJoin('kpis AS C', 'E.id', '=', 'C.emp_id')
            ->select(
                'E.id', 'E.full_name', 'E.staff_id', 'E.supervisor_name', 
                'E.supervisor_id', 'E.designation','C.items',
            )
            ->where('E.id', $emp_id) 
            ->get(); 
    }

  public static function getEmployeeList($emp_id) 
{
    $rows = Employee::from('employees as E')
        ->join('kpis AS C', 'E.id', '=', 'C.emp_id') 
        ->select('E.id', 'E.full_name', 'C.items')
        ->where('E.id', $emp_id) 
        ->get();

    $processedData = collect();

    foreach ($rows as $row) {
        // JSON স্ট্রিং হলে অ্যারেতে রূপান্তর
        $itemsArray = is_string($row->items) ? json_decode($row->items, true) : $row->items;

        if (is_array($itemsArray)) {
            foreach ($itemsArray as $item) {
                // প্রতিটি অবজেক্ট (Letter, Product ইত্যাদি) আলাদা করে পুশ করা হচ্ছে
                $processedData->push([
                    'type'       => $item['type'] ?? 0,
                    'label_name' => $item['label_name'] ?? 'General',
                    'all_items'  => $item['all_items'] ?? []
                ]);
            }
        }
    }

    // এখন type এবং label_name অনুযায়ী গ্রুপিং
    return $processedData->groupBy(['type', 'label_name']);
}



    public static function getSingleEmployee2($emp_id) 
    {
        return self::from('employees as E')
            ->leftJoin('kpis AS C', 'E.id', '=', 'C.emp_id')
            ->select(
                'E.id', 'E.full_name', 'E.staff_id', 'E.supervisor_name', 
                'E.supervisor_id', 'E.designation','C.items',
                'C.label_name', 'C.criteria', 'C.target', 'C.score', 'C.actual', 'C.weight', 'C.type'
            )
            ->where('E.id', $emp_id) 
            ->get(); 
    }

    public static function getEmployeeList2($emp_id) 
    {
        return Employee::from('employees as E')
            ->join('kpis AS C', 'E.id', '=', 'C.emp_id') 
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
                'C.type',
                'C.items'
            )
            ->where('E.id', $emp_id) 
            ->orderBy('C.type')
            ->orderBy('C.label_name') 
            ->get()
            ->groupBy(['type', 'label_name']); 
    }

}
