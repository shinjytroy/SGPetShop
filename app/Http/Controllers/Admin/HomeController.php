<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homedb(Request $request)
    {
        $categories = Categories::all();
        $prods = Product::all();
        $order = Order::all();
        $ord = OrderDetail::all();
        $user = User::all();
        
        return view ('admin.homedb',compact('categories','prods' ,'order','user','ord'));
    }

}
