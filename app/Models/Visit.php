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
                'V.inquiry_id', 
                DB::raw('MAX(V.details) as details'),  
                DB::raw('MAX(V.created_at) as created_at'),  
                DB::raw('MAX(U.name) as user_name'),  
                DB::raw('MAX(I.company_name) as company_name'),  
                DB::raw('MAX(I.name) as owner_name'),  
                DB::raw('MAX(I.phone) as phone'),
                DB::raw('MAX(I.engine_type) as engine_type'),
                DB::raw('MAX(I.vessel_name) as vessel_name'),
                DB::raw('COUNT(*) as visit_count')  
            );

        if ($from_date) {
            $visits->whereDate('V.created_at', '>=', $from_date);
        }
        if ($to_date) {
            $visits->whereDate('V.created_at', '<=', $to_date);
        }

        $visits = $visits
            ->groupBy('V.inquiry_id')  
            ->orderByDesc('visit_count')  
            ->paginate(10);  

        return $visits;
    }


    public static function getVisitList2($from_date = null, $to_date = null)
    {
        $visits = Visit::from('visits as V')
            ->join('inquiries AS I', 'I.id', '=', 'V.inquiry_id') 
            ->join('users AS U', 'U.id', '=', 'V.userid') 
            ->select(
                'V.inquiry_id',  // Group by inquiry_id
                'V.details', 
                'V.created_at', 
                'U.name as user_name',
                'I.company_name as company_name',
                'I.name',
                'I.phone',
                'I.engine_type',
                'I.vessel_name',
                // DB::raw('COUNT(*) as visit_count') 
                DB::raw('COUNT(DISTINCT V.inquiry_id) as visit_count')  // Count distinct inquiry_id for each group
            );

        
            if ($from_date) {
                $visits->whereDate('V.created_at', '>=', $from_date);
            }
            if ($to_date) {
                $visits->whereDate('V.created_at', '<=', $to_date);
            }

            $visits = $visits
                ->groupBy('V.inquiry_id', 'V.details','V.created_at', 'U.name', 'I.company_name', 'I.name', 'I.phone', 'I.engine_type', 'I.vessel_name')
                ->orderByDesc('visit_count')  // Order by the count of visits (most visits first)
                ->paginate(10);  

            return $visits;
    }

    

}
