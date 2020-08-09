<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TsActivityCollege extends Model
{
    protected $table = 'ts_activity_college';
    
    public function getCollegeIdOrderIdAttribute()
    {
        return "{$this->college_id} {$this->order_id}";
    }
}
