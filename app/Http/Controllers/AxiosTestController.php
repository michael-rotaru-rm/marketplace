<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class AxiosTestController extends Controller{
    public function api_call(){
        $response = Product::all();
        return $response;
    }
}