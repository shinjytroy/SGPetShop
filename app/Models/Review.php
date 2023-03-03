<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    protected $fillable=['review_name','description', 'is_accept','user_id','product_id','created_at'];
    
    public function user(){
        return $this->belongTo(User::class, 'review_id');
    }

}
