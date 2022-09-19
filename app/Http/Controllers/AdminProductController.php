<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Product;
use App\Models\Subcategory;

class AdminProductController extends Controller
{
    public function index(){
        return inertia('Admin/Dashboard',[
            //todo pagination
            'products' => Product::paginate(50)
        ]);
    }

    public function create(){
        return inertia('Admin/Create',['subcategories' => Subcategory::all()]);
    }

    public function store(){
        $attributes = request()->validate([
            'subcategory_id' => ['required', Rule::exists('subcategories','id')],
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
        // return view('admin.products.edit',['product' => $product]);
        return inertia('Admin/Edit',['subcategories' => Subcategory::all(),'product' => $product]);
    }

    public function update(Product $product){
        $attributes = request()->validate([
            'subcategory_id' => ['required', Rule::exists('subcategories','id')],
            'title' => 'required|max:255|min:3',
            'slug' => ['required', Rule::unique('products','slug')->ignore($product->id)],
            'description' => 'required|max:1000|min:4',
            'photo' => 'nullable|image',
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
