<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    
    protected $table = 'coupons';

    protected $fillable=['id','code','type','value','cart_value'];

    public function index(){
        return $this->belongsTo(CouponsController::class, 'id','code','type','value','cart_value');
    }
}
