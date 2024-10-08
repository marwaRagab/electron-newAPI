<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionCompleted extends Model
{
    use HasFactory ,SoftDeletes;

    protected $table = 'transactions_completed';

    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'whatsapp',
        'Communication_method',
        'created_by',
         'updated_by'
    ];

    // Define any relationships here
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
