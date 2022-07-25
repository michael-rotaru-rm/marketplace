<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    
    public function list(){
        return view('products/list',['products' => Product::latest()->filter(request(['search','category']))->get()]);
    }

    public function show(Product $product){
        return view('products/show', [
            'product' => $product,
            'category_name' => Category::find($product->category_id)?->name,
        ]);
    }
}
