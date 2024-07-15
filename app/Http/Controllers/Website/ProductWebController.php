<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Interface\Carts\cartsRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{


    public function show($slug,cartsRepositoryInterface $cart){
        $cartDetails = $cart->getCartData()->all();

        $product = Product::with(['category'=>function($query){$query->select('id', 'name');}])
        ->where('slug', $slug)->firstOrFail();
        

        return view('Website.Home.product-details',compact(['product','cartDetails']));
    }

}
