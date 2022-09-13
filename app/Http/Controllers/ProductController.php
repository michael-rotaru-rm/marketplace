<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class ProductController extends Controller{
    public function list(){
        // return view('products/list',['products' => Product::latest()->filter(request(['search','subcategory']))->get()]);
        $products = Product::latest()->filter(request(['search','subcategory']))->get();
        $products->map(function($prod) {
            $prod->image_url = asset('storage/'.$prod->image_url);
            return $prod;
        });
        
        $attributes = ['products' => $products, 'categories' => Category::all(), 'filters' => request(['search','category','subcategory'])];
        if(request(['category'])){
            $curentCategory = Category::where('slug', request('category'))->first();
            if($curentCategory){
                $subcategories = Subcategory::where('category_id', $curentCategory->id)->get();
                $attributes['subcategories'] = $subcategories;
            }
        }

        return inertia('Products/List', $attributes);
    }

    public function show(Product $product){
        $subcategory = Subcategory::find($product->subcategory_id);
        $product->image_url = asset('storage/'.$product->image_url);
        return inertia('Products/Show', [
            'product' => $product,
            'category_name' => Category::find($subcategory?->category_id)?->name,
            'subcategory_name' => $subcategory?->name,
        ]);
    }
}