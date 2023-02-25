<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'created_at', 'update_at'];

    public function order(){
        return $this->belongTo(Order::class, 'order_id');
    }
}
