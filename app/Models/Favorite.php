<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function product(){
        return $this->hasMany(Product::class, 'product_id');
    }

    public function user(){
        return $this->hasMany(User::class, 'user_id');
    }
}
