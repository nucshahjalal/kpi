<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use DB;

class Visit extends Model
{
    use HasFactory;
    protected $guarded = [];
     
    // public static function getVisitList($from_date = null, $to_date = null)
    // {
    //     $visits = Visit::from('visits as V')
    //         ->join('users AS U', 'U.id', '=', 'V.userid')
    //         ->select(
    //             'V.userid',
    //             'U.name as user_name',
    //             DB::raw('COUNT(DISTINCT V.inquiry_id) as inquiry_count')
    //         );

    //     if ($from_date) {
    //         $visits->whereDate('V.created_at', '>=', $from_date);
    //     }
    //     if ($to_date) {
    //         $visits->whereDate('V.created_at', '<=', $to_date);
    //     }

    //     $visits = $visits
    //         ->groupBy('V.userid', 'U.name')
    //         ->orderBy('inquiry_count', 'desc')
    //         ->paginate(10);

    //     return $visits;
    // }

    public static function getVisitList( $from_date = null, $to_date = null)
    {
        $visits = Visit::from('visits as V')
                ->join('inquiries AS I', 'I.id', '=', 'V.inquiry_id')
                ->join('users AS U', 'U.id', '=', 'V.userid');
                
                if ($from_date) {
                    $visits->whereDate('V.created_at', '>=', $from_date);
                }
                if ($to_date) {
                    $visits->whereDate('V.created_at', '<=', $to_date);
                }

            $visits = $visits->orderBy('V.id', 'desc') ->paginate(10, ['V.*','I.company_name','I.name','I.phone','I.engine_type','I.vessel_name','I.name','U.name as user_name']);
            return $visits;
    }

}
