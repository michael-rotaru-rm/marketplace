<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function list(){
        return view('products/list',['products' => Product::latest()->filter(request(['search']))->get()]);
    }

    public function show(Product $product){
        return view('products/show', [
            'product' => $product
        ]);
    }
}
