<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Informations;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Contact;
use App\Models\Membership;
use App\Models\Review;
use App\Models\Footer;
use App\Models\User;

use Illuminate\Contracts\Session\Session;

class HomeController extends Controller
{
    public $sorting;
    public $pagesize;
    
    public function index() 
    {
        $prods = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        $order=Order::all();
        $footer = Footer::all();
        return view('fe.index', compact(
            'prods', 'categories', 'brands','order' ,'footer'
        ));
        
    }
    public function layout() 
    {
        
        $footer = Footer::all();
        return view('fe.layout', compact(
            'footer'
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
        $footer = Footer::all();
        return view('fe.product', compact('prod','category','review','footer'));
    }
    
    public function shopByCategory($id){
        $review = Review::all();
        $categories = Category::all();
        $brands = Brand::all();
        $footer = Footer::all();
        //$prods = Product::where('categorie_id', $id);
        $prods = Product::where('categorie_id', 'LIKE', "%{$id}%")->get();
        
        return view('fe.shop.search-result', compact('prods','review', 'categories', 'brands','footer'));
    }

    public function searchProducts(Request $request){
        $review = Review::all();
        $categories = Category::all();
        $brands = Brand::all();
        $footer = Footer::all();
        $prods = Product::whereBetween('price',[$request->start_price, $request->end_price])->get();
        return view('fe.shop.search-result', compact('prods', 'review', 'categories', 'brands','footer'))->render();
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
        $footer = Footer::all();
        return view('fe.viewCart', compact('category','footer'));
       
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
        $footer = Footer::all();
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            foreach($cart as $item){
                $total += $item->product->price * $item ->quantity;
            }
        }
        return view('fe.checkout',compact('total','footer'));
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
        $footer = Footer::all();
        return view('fe.thankyou' , compact('footer'));
    }
     public function shop()
    {
        $prods = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        $min_price = Product::min('price');
        $max_price = Product::max('price');
        $footer = Footer::all();
        return view('fe.shop.search-result', compact(
            'prods', 'brands', 'categories', 'footer', 'min_price', 'max_price' , 
        ));
    }
    public function about()
    {
        $mems = Membership::all();
        $blogs = Blog::all();
        $infors=Informations::all();
        $footer = Footer::all();
        return view('fe.about', compact('mems','blogs','infors','footer' ));
     
    }
    public function contact()
    {
        $footer = Footer::all();

        return view ('fe.contact',compact('footer'));
    }
    public function processContact(Request $request){
        $contactData =$request->all();  
        $contact = Contact::create($contactData);
        // luu review
        
         $request->session()->forget('contact');
         return  redirect()->route ('contact',compact('contact'))->with('messagesuccess','');
   
    }
    public function person(Request $request)
    {
       
        $footer= Footer::all();   
        $order = Order::all()   ;
         return view ('fe.person' , compact('footer','order'));
       
    }
    public function history(Request $request ,  $id)
    {
        $footer= Footer::all();
        $prod = Product::all();
        $user = User::all();
        $order = OrderDetail::where('order_id','=',$id)->get();
        return view ('fe.history',compact('footer','prod','user','order'));
    }
    public function review(Request $request){   
        $footer= Footer::all();  
        return view('fe.review',compact('footer'));        
    }
    public function processReview(Request $request){   
        $rv =$request->all();
        $footer= Footer::all();  
        $rv['user_id']=$request->session()->get('user')->id;
        
        $review = Review::create($rv);
        // luu review
        
         $request->session()->forget('review');
         return view ('fe.review')->with('thongbao','Thank you ');    
    }
}
