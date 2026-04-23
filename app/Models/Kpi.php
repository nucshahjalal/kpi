<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use DB;

class Kpi extends Model
{
    use HasFactory;

    protected $guarded = [];
     
    protected $fillable = [
        'emp_id', 
        // 'label_name', 
        // 'criteria', 
        // 'weight', 
        // 'target', 
        // 'actual', 
        // 'score', 
         'items', 
        // 'type' 
    ];

    protected $casts = [
        'items' => 'array',
      //  'label_name' => 'array',
       // 'type' => 'array',
    ];
}
