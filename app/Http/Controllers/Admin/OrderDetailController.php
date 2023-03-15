<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod = Product::all();
        $user = User::all();
        $ord = OrderDetail::all();
        return view('admin.orderdetail.index', compact('ord','user', 'prod'));
    }
    public function view (Request $request ,  $id )
    {
        $prod = Product::all();
        $user = User::all();
        $order = OrderDetail::where('order_id','=',$id)->get();
        return view('admin.orderdetail.view', compact('order','user', 'prod'));
    }
  
   
    

}
