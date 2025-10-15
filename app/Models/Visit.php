<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'technician_name','customer_name','customer_email','roof_size',
        'roof_type','monthly_consumption_kwh','shaded','notes'
    ];
}
