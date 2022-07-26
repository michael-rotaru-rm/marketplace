<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class ProductController extends Controller
{
    
    public function list(){
        return view('products/list',['products' => Product::latest()->filter(request(['search','subcategory']))->get()]);
    }

    public function show(Product $product){
        $subcategory = Subcategory::find($product->subcategory_id);
        return view('products/show', [
            'product' => $product,
            'category_name' => Category::find($subcategory?->category_id)?->name,
            'subcategory_name' => $subcategory?->name,
        ]);
    }
}
