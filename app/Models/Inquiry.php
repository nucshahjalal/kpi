<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inquiry extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getInquiryList($filter) {
        
        $inquries = Inquiry::from('inquiries as I')
                    ->where('I.company_name', 'like', '%'.$filter.'%')
                    ->orWhere('I.name', 'like', '%'.$filter.'%')
                    ->orWhere('I.phone', 'like', '%'.$filter.'%')
                    ->orWhere('I.price', 'like', '%'.$filter.'%')
                    ->orWhere('I.pbt', 'like', '%'.$filter.'%')
                    ->orderBy('I.id','desc')
                    ->paginate(10, array('I.*'));
        return $inquries;
    }
  
}
