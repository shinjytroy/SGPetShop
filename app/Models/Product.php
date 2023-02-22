<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name', 
        'slug', 
        'description', 
        'price',
        'sale_price', 
        'image', 
        'brands_id',
        'categories_id',
        'reviews_id',
         'stock',
         'status',
         'featured'];
}
