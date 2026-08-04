<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'address',
        'phone',
        'email',
        'website',
        'ninea',
        'rc',
    ];
}
