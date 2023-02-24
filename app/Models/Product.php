<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //protected $primaryKey = 'product_id';
    protected $fillable=[
        'name', 
        'slug', 
        'description', 
        'price',
        'sale_price', 
        'image', 
        'brand_id',
        'categorie_id',
         'stock',
         'status',
         'featured'];
         
    public function category(){
        
        return $this->hasMany(Category::class, 'categorie_id');
    }
}
