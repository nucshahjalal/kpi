<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use DB;

class Visit extends Model
{
    use HasFactory;
    protected $guarded = [];
     
    

    public static function getVisitList($from_date = null, $to_date = null)
    {
        $visits = Visit::from('visits as V')
            ->join('inquiries AS I', 'I.id', '=', 'V.inquiry_id') 
            ->join('users AS U', 'U.id', '=', 'V.userid') 
            ->select(
                'V.inquiry_id',  // Group by inquiry_id
                'V.details', 
                'U.name as user_name',
                'I.company_name as company_name',
                'I.name',
                'I.phone',
                'I.engine_type',
                'I.vessel_name',
                 DB::raw('COUNT(*) as visit_count') 
                //DB::raw('COUNT(DISTINCT V.inquiry_id) as visit_count')  // Count distinct inquiry_id for each group
            );

        
            if ($from_date) {
                $visits->whereDate('V.created_at', '>=', $from_date);
            }
            if ($to_date) {
                $visits->whereDate('V.created_at', '<=', $to_date);
            }

            $visits = $visits
                ->groupBy('V.inquiry_id', 'V.details', 'U.name', 'I.company_name', 'I.name', 'I.phone', 'I.engine_type', 'I.vessel_name')
                ->orderByDesc('visit_count')  // Order by the count of visits (most visits first)
                ->paginate(10);  

            return $visits;
    }

    

}
