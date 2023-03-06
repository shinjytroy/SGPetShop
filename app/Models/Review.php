<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
<<<<<<< HEAD
    protected $fillable=['review_name','description', 'is_accept','user_id','product_id','created_at'];
=======
    protected $fillable=['review_name','description','rating','is_accept'];
>>>>>>> 68b04d725a8086c91c87c1d9fd9f61b018fb7a89
    
    public function user(){
        return $this->belongTo(User::class, 'user_id');
    }

}
