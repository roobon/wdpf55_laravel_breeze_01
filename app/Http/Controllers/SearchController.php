<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;





class SearchController extends Controller
{
    public function Search(Request $request) {
        $categories = Category::all();
        
        if($request->filled('search')){
            $products = Product::search($request->search)->where('category_id', $request->cat)->get();
        } else {
            $products = Product::all();
        }

       return view('search', compact('products', 'categories'));
    }
}
