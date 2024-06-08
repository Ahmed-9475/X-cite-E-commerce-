<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{
    public function index(){

       // return view('Website.Home.product-details');
    }


    public function show(Product $product){


        return view('Website.Home.product-details',compact('product'));
    }

}
