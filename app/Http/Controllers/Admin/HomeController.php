<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Review;
use App\Models\User;
use App\Models\Coupon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homedb(Request $request)
    {
        $category = Category::all();
        $brand = Brand::all();
        $prods = Product::all();
        $order = Order::all();
        $ord = OrderDetail::all();
        $review = Review::all();
        $user = User::all();
        $coupon = Coupon::all();
        
        return view ('admin.homedb',compact('category','brand','prods' ,'order','ord','review','user', 'coupon'));
    }

}
