<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function regions()
    {
        return $this->hasMany(Region::class);
    }
    public function nationality()
    {
        return $this->hasMany(Nationality::class);
    }

    public function branch()
    {
        return $this->hasMany(Branch::class);
    }

    public function ministry()
    {
        return $this->hasMany(Ministry::class);
    }

    public function governorate()
    {
        return $this->hasMany(Governorate::class);
    }
    
    public function installment_Percentage()
    {
        return $this->hasMany(Installment_Percentage::class);
    }

    public function ministry_Percentage()
    {
        return $this->hasMany(Ministry_Percentage::class);
    }

    public function court()
    {
        return $this->hasMany(Court::class);
    }

    public function police_station()
    {
        return $this->hasMany(Police_station::class);
    }

    public function bank()
    {
        return $this->hasMany(Bank::class);
    }
}
