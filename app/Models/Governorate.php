<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Governorate extends Model
{
    use HasFactory ,SoftDeletes;

    public function region()
    {
        return $this->hasMany(Region::class );
    }
    public function court()
    {
        return $this->hasMany(related: Court::class );
    }
}
