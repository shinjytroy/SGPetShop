<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Footer;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $footer= Footer::all();
        $review = Review::all();
        $categories = Category::all();
        $brands = Brand::all();
        $keyword = $request->search;
        $prods = Product::where('name', 'LIKE', '%'.$keyword.'%')->get();
        return view('fe.shop', compact('review', 'categories', 'brands', 'prods','footer'));
        // $query = $request->get('query');
        // $prods = Product::where('name', 'LIKE', "%{$query}%")->get();
        // return response()->json($prods);
    }
}
