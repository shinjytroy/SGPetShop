<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\Category;
use App\Models\Brand;
class SearchController extends Controller
{
    public function search(Request $request)
    {
        $review = Review::all();
        $categories = Category::all();
        $brands = Brand::all();
        $keyword = $request->search;
        $prods = Product::where('name', 'LIKE', '%'.$keyword.'%')->get();
        return view('fe.shop.search-result', compact('review', 'categories', 'brands', 'prods'));
        // $query = $request->get('query');
        // $prods = Product::where('name', 'LIKE', "%{$query}%")->get();
        // return response()->json($prods);
    }
}
