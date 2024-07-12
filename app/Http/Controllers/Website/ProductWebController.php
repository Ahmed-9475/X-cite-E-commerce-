<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{


    public function show($slug){

        $product = Product::with(['category'=>function($query){$query->select('id', 'name');}])
        ->where('slug', $slug)->firstOrFail();
        

        return view('Website.Home.product-details',compact('product'));
    }

}
