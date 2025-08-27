<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'tbl_profiles';

    // (Optional) Define fillable fields
    protected $fillable = [
        'user_id',
        'bio',
        'address',
        'phone',
    ];
}
