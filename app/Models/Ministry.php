<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ministry extends Model
{
    use HasFactory,SoftDeletes;

    public function ministryPercentage()
    {
        return $this->hasOne(Ministry_Percentage::class ,'id','ministry_percentage_id');
    }
}
