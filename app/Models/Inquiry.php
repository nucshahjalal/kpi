<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inquiry extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getInquiryList( $from_date = null, $to_date = null)
        {
            $inquiries = Inquiry::from('inquiries as I')
                ->orderBy('I.id','desc');
                // ->where(function($query) use ($filter) {
                //     $query->where('I.company_name', 'like', '%'.$filter.'%')
                //         ->orWhere('I.name', 'like', '%'.$filter.'%')
                //         ->orWhere('I.phone', 'like', '%'.$filter.'%')
                //         ->orWhere('I.price', 'like', '%'.$filter.'%')
                //         ->orWhere('I.pbt', 'like', '%'.$filter.'%');
                // });

            if ($from_date) {
                $inquiries->whereDate('I.created_at', '>=', $from_date);
            }

            if ($to_date) {
                $inquiries->whereDate('I.created_at', '<=', $to_date);
            }

            $inquiries = $inquiries->orderBy('I.id', 'desc')
                ->paginate(10, ['I.*']);

            return $inquiries;
        }

        
    public static function getInquiryList2() {
        
        $inquries = Inquiry::from('inquiries as I')
                    // ->where('I.company_name', 'like', '%'.$filter.'%')
                    // ->orWhere('I.name', 'like', '%'.$filter.'%')
                    // ->orWhere('I.phone', 'like', '%'.$filter.'%')
                    // ->orWhere('I.price', 'like', '%'.$filter.'%')
                    // ->orWhere('I.pbt', 'like', '%'.$filter.'%')
                    ->orderBy('I.id','desc')
                    ->paginate(10, array('I.*'));
        return $inquries;
    }
  
}
