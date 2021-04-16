<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function metas()
    {
        return $this->hasMany(UserMeta::class);
    }

    public function gender()
    {
        return $this->metas->where('meta_key', 'gender')->pluck('meta_value')->first();
    }

    public function dob()
    {
        return $this->metas->where('meta_key', 'dob')->pluck('meta_value')->first() ?? '';
    }

    public function profile_picture()
    {
        return $this->metas->where('meta_key', 'profile_picture')->pluck('meta_value')->first() ?? '';
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
