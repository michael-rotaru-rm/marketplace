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
        if(!$this->subcategories->count()){
            return redirect("/?category=".$this->curentCategory->slug."&".http_build_query(request()->except('subcategory')));
        }
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->curentCategory = Category::where('slug', request('category'))->first();
        if($this->curentCategory){
            $this->subcategories = Subcategory::where('category_id', $this->curentCategory->id)->get();
        }
    }
    
    public function render()
    {
        return view('livewire.subcategory-dropdown');
    }
}