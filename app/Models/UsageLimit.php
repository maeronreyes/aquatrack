<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsageLimit extends Model
{
    //
    protected $table = 'tbl_usage_limits';
        protected $fillable = [
        'user_id',
        'period_type',
        'max_consumption',
    ];

}
