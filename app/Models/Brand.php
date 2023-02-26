<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'brands';
    
    protected $fillable=['brand_name','slug','description','brand_image_path'];

    public function product(){
        return $this->belongTo(Product::class, 'brand_id');
    }
}
