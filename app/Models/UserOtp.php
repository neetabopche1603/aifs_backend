<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOtp extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'mobile',
        'dob',
        
    ];

    protected function dob(): Attribute
    {
        return new Attribute(
            // get: fn ($value) =>  Carbon::parse($value)->format('m/d/Y'),
            set: fn ($value) =>  Carbon::parse($value)->format('Y-m-d'),
        );
    }

}
