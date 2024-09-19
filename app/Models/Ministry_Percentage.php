<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ministry_Percentage extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'ministry_percentages';

}
