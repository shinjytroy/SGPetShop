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
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg' && $extension != 'webp' && $extension != 'jfif') {
                return view('admin.product.create')
                    ->with('loi', 'You can only select files with the extension: jpg, png, jpeg, webp, jfif ');
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

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg' && $extension != 'webp' && $extension != 'jfif') {
                return view('admin.product.create')
                    ->with('loi', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg, webp, jfif');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images", $imageName);
            $prodData['image'] = $imageName;
        } else {
            $imageName = null;
        }


        $product->update($prodData);
        return redirect()->route('admin.product.index', compact('category', 'brand'));
    }

   
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index');
    }

}
    