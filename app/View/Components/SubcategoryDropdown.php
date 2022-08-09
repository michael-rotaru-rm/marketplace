<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategoryDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {   
        $curentCategory = Category::where('slug', request('category'))->first();
        $subcategories = Subcategory::where('category_id', $curentCategory?->id)->get();

        return view('components.category-dropdown',[
            'subcategories' => $subcategories
        ]);
    }
}
