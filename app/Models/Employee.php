<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use DB;

class Employee extends Authenticatable
{
    use HasFactory;use Notifiable;
    protected $guarded = [];
}
