<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inquiry extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getInquiryList($filter) {
        
        $inquries = Inquiry::from('inquries as I')
                    ->where('I.emp_id', 'like', '%'.$filter.'%')
                    ->orWhere('I.name', 'like', '%'.$filter.'%')
                    ->orWhere('I.designation', 'like', '%'.$filter.'%')
                    ->orWhere('I.phone', 'like', '%'.$filter.'%')
                    ->orderBy('I.id','desc')
                    ->paginate(10, array('I.*'));
        return $inquries;
    }
  
}
