<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $fillable=['categorie_name','slug','description', 'image_path'];
    
    public function product(){
        return $this->belongTo(Product::class, 'categorie_id');
    }

    
}
