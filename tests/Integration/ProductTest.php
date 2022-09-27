<?php

namespace Tests\Unit;

use App\Product;
// use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    // public function it_creates()
    // {
    //     // $attributes = request()->validate([
    //     //     'subcategory_id' => ['required', Rule::exists('subcategories','id')],
    //     //     'title' => 'required|max:255|min:3',
    //     //     'slug' => ['required', Rule::unique('products','slug')],
    //     //     'description' => 'required|max:1000|min:4',
    //     //     'photo' => 'required|image',
    //     //     'price' => 'required|numeric',
    //     // ]);

    //     // $attributes["user_id"] = auth()->id();
    //     // $attributes["image_url"] = request()->file('photo')->store("uploads");
        
    //     $product = Product::create([
    //         'subcategory_id' => 1,
    //         'title' => 'productname',
    //         'slug' => 'productslug',
    //         'description' => 'productdesc',
    //         'photo' => '',
    //         'price' => '123'
    //     ]);

    //     $this->assertEquals('productname', $product->title);
    // }

    public function if_fetches(){
        // factory(Product::class, 3)->create();
        $targetProd = factory(Product::class, ['subcategory' => '1'])->create();

        $targetProd::

        $this->assertEquals($targetProd->subcategory_id,'100')
    }
}
