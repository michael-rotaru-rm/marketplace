<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function index(){
        return view('admin.products.index',[
            'products' => Product::paginate(50)
        ]);
    }

    public function create(){
        return view('admin.products.create');
    }

    public function store(){
        $attributes = request()->validate([
            'category_id' => ['required', Rule::exists('categories','id')],
            'title' => 'required|max:255|min:3',
            'slug' => ['required', Rule::unique('products','slug')],
            'description' => 'required|max:1000|min:4',
            'photo' => 'required|image',
            'price' => 'required|numeric',
        ]);

        $attributes["user_id"] = auth()->id();
        $attributes["image_url"] = request()->file('photo')->store("uploads");

        Product::create($attributes);

        return redirect('/');
    }

    public function edit(Product $product){
        return view('admin.products.edit',['product' => $product]);
    }

    public function update(Product $product){
        $attributes = request()->validate([
            'category_id' => ['required', Rule::exists('categories','id')],
            'title' => 'required|max:255|min:3',
            'slug' => ['required', Rule::unique('products','slug')->ignore($product->id)],
            'description' => 'required|max:1000|min:4',
            'photo' => 'image',
            'price' => 'required|numeric',
        ]);

        if(isset($attributes["photo"])){
            $attributes["image_url"] = request()->file('photo')->store("uploads");
        }

        $product->update($attributes);

        return back()->with('success','Product Updated!');
    }

    public function destroy(Product $product){
        $product->delete();

        return back()->with('success','Product Deleted!');
    }
}
