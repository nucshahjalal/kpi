<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visit extends Model
{
    use HasFactory;
    protected $guarded = [];
        
    public static function getVisitList($filter) {
        
        $visits = Inquiry::from('visits as V')
                    ->join('inquiries AS I', 'I.id', '=', 'V.inquiry_id')
                    ->where('V.userid', 'like', '%'.$filter.'%')
                    ->where('V.inquiry_id', 'like', '%'.$filter.'%')
                    ->orWhere('V.details', 'like', '%'.$filter.'%')
                    ->orWhere('I.company_name', 'like', '%'.$filter.'%')
                    ->orWhere('I.name', 'like', '%'.$filter.'%')
                    ->orderBy('V.id','desc')
                    ->paginate(10, array('V.*','I.company_name','I.name'));
        return $visits;
    }
  
}
