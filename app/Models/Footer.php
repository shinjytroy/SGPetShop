<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'address',
        'phone',
        'email',
        'hotline',
    ];
    use HasFactory;
}
