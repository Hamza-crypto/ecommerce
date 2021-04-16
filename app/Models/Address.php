<?php

namespace App\Models;

use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory, SoftDeletes, Encryptable;

    protected $guarded = [];

    protected $encryptable = [
        'street_1', 'street_2', 'city', 'region', 'country', 'zipcode'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
