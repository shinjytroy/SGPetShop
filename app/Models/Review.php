<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    protected $fillable=['review_name','description','rating','is_accept'];
    
    public function user(){
        return $this->belongTo(User::class, 'user_id');
    }

}
