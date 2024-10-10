<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
