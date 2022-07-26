<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategoryDropdown extends Component
{
    public $curentCategory;
    public $categories = [];
    public $subcategories = [];

    public function updateSubcategories($curentCategoryId){
        $this->curentCategory = Category::find($curentCategoryId);
        $this->subcategories = Subcategory::where('category_id', $curentCategoryId)->get();
    }

    public function mount()
    {
        $this->categories = Category::all();
    }
    
    public function render()
    {
        return view('livewire.subcategory-dropdown');
    }
}  