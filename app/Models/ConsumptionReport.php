<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsumptionReport extends Model
{
    //
    protected $table = 'tbl_consumption_reports';
    public function user()
    {
          return $this->belongsTo(User::class, 'user_id'); 
    }
}
