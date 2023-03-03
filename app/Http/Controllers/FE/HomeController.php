<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Review;
use Illuminate\Contracts\Session\Session;

class HomeController extends Controller
{
    public function index() 
    {
        $prods = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        $order=Order::all();
        return view('fe.index', compact(
            'prods', 'categories', 'brands','order'
        ));
        
    }

    public function product($slug) 
    {
        $category = Category::all();
        // get() chuyển laravel collection thành php array
        // $prod = Product::where('slug', $slug)->get();
        // hàm first() lấy phần tử đầu
        $prod = Product::where('slug', $slug)->first();
        $review=Review::all();
        return view('fe.product', compact('prod','category','review'));
    }
    
    public function addCart(Request $request) 
    {
        $pid = $request->pid;
        $quantity = $request->quantity;

        $prod = Product::find($pid);
        $cartItem = new CartItem($prod, $quantity);

        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        } else {
            $cart = [];
        }
    // xử lý cộng dồn quantity nếu item trùng
    for ($i=0; $i < count($cart); $i++) { 
        # code...
        if ($cart[$i] ->product->id ==$pid) {
            # code...
            break;
        }
    }
    if ($i <count($cart)) {
        # code...
        // truong hop product da co trong cart => cong don quantity
    $cart[$i]->quantity += $quantity;
    }else {
        
        $cart[] = $cartItem;
    }
           
        
        $request->session()->put('cart', $cart);
    }

    public function viewCart(Request $request) 
    {
        $category = Category::all();
        return view('fe.viewCart', compact('category'));
        // if ($request->session()->has('cart')) {
        //     $cart = $request->session()->get('cart');
        //     //dd($cart);
        //     echo "Product Name: " . $cart[0]->product->name;
        // } else{
        //     echo 'No Product';
        // }
    }

    public function clearCart(Request $request) 
    {
        $request->session()->forget('cart');
        return view ('fe.viewCart');
    }
    public function changeCartItem(Request $request)
    {
        # code...
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            $pid = $request->pid;
            $quantity = $request ->quantity;    

            for ($i=0; $i < count($cart); $i++) { 
                # code...
                if ($cart[$i] ->product->id ==$pid) {
                  # code...
                    break;
                }   
            }
            if ($i <count($cart)) {
                # code...
            
                $cart[$i]->quantity = $quantity;
            }
             $request->session()->put('cart', $cart);
         }
    }
    public function removeCartitem(Request $request)
    {
        # code...
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            $pid = $request->pid;
            $quantity = $request ->quantity;

            for ($i=0; $i < count($cart); $i++) { 
                # code...
                if ($cart[$i] ->product->id ==$pid) {
                  # code...
                    break;
                }   
            }
            if ($i <count($cart)) {
                # code...
            
                unset($cart[$i]);
            }
             $request->session()->put('cart', $cart);
         }
    }
    public function checkout(Request $request){
        $total=0;
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            foreach($cart as $item){
                $total += $item->product->price * $item ->quantity;
            }
        }
        return view('fe.checkout',compact('total'));
    }
    public function processCheckout(Request $request){
       $cart =$request->all();
       $cart['order_date']=date('Y-m-d' , time());
       $cart['user_id']=$request->session()->get('user')->id;
       $ord = Order::create($cart);
       //dd($ord);
       // luu order details
       $cart = $request->session()->get('cart');
       foreach ($cart as $item){
        $od = new OrderDetail();
        $od->order_id=$ord->id;
        $od->product_id=$item->product->id;
        $od->price=$item->product->price;
        $od->quantity=$item->quantity;
        $od->save();

       }
        $request->session()->forget('cart');
        
        return view('fe.thankyou');
    }
     public function shop()
    {
        $prods = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('fe.shop', compact(
            'prods', 'brands', 'categories'
        ));
    }
    public function about()
    {
        return view ('fe.about');
    }
    public function contact()
    {
        return view ('fe.contact');
    }
    public function person()
    {
        return view ('fe.person');
    }
    public function history()
    {
        return view ('fe.history');
    }
    public function review(Request $request){     
        return view('fe.review');        
    }
    public function processReview(Request $request){

      

        $rv =$request->all();
  
        $rv['user_id']=$request->session()->get('user')->id;
        
        $review = Review::create($rv);
        // luu review
        
         $request->session()->forget('review');
         return view ('fe.thankyou')->with('thongbao','Thank you ');
        
     
           
        
       
     
    }
}
