<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $prods = Product::all();
        $category = Category::all();
        $brand = Brand::all();
<<<<<<< HEAD
        
=======
        //Chọn những sản phẩm có categorie_id = 1;
        //$activeProducts = Product::where('categorie_id', 1)->orderBy('id', 'DESC')->limit(5)->get();
        //-------------
        //Loại bỏ những categorie_id =1
        //$prods = Product::all();
        // $activeProds = $prods->reject(function ($prod){
        //     return $prod->categorie_id == 1;
        // });
>>>>>>> 3c27b15bbae46666cbb382bbf76a0f682499a88e
        return view('admin.product.index', compact('prods', 'category', 'brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category, Brand $brand)
    {
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product.create', compact('category', 'brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $prodData = $request->all();
        $category = Category::all();
        $prodData['slug'] = \Str::slug($request->name);


        // process upload

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg' && $extension != 'webp') {
                return view('admin.product.create')
                    ->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg ');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images", $imageName);
        } else {
            $imageName = null;
        }
        $prodData['image'] = $imageName;

        Product::create($prodData);
        return redirect()->route('admin.product.index', compact('category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Category $category, Brand $brand)
    {
        //$product=Product::all();
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product.edit', compact('product', 'category', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Category $category, Brand $brand)
    {
        $prodData = $request->all();
        $category = Category::all();
        $brand = Brand::all();
        //$prodData['categorie_id'] = $request->categorie_id;
        $prodData['slug'] = \Str::slug($request->name);
<<<<<<< HEAD
        
=======
>>>>>>> 3c27b15bbae46666cbb382bbf76a0f682499a88e
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg' && $extension != 'webp') {
                return view('admin.product.create')
                    ->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images", $imageName);
            $prodData['image'] = $imageName;
        } else {
            $imageName = null;
        }
<<<<<<< HEAD
        
=======

>>>>>>> 3c27b15bbae46666cbb382bbf76a0f682499a88e
        $product->update($prodData);
        return redirect()->route('admin.product.index', compact('category', 'brand'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index');
    }

}
