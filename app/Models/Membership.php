<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
     protected $fillable=
     [
        'name',       
        'description', 
        'position',
        'age',       
        'image', 
    ];
    use HasFactory;
}
