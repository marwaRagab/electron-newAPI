<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Installment_Client extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'installment_clients';

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function region()
    {
        return $this->belongsTo(Region::class, 'area_id');
    }
    public function ministry_working()
    {
        return $this->belongsTo(Ministry::class, 'ministry_id')->where('type','working');
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function Boker()
    {
        return $this->belongsTo(Boker::class, 'boker_id');
    }
    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }
}
