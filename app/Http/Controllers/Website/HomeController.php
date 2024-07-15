<?php

namespace App\Http\Controllers\Website;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interface\Carts\cartsRepositoryInterface;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(cartsRepositoryInterface $cart)
    {

        $cartDetails = $cart->getCartData()->all();
        $products = Product::with('category')->take(8)->active()->latest()->get();
        return view('Website.Home.index',compact(['products','cartDetails']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
