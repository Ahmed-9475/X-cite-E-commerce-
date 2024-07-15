<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interface\Carts\cartsRepositoryInterface;
use App\Models\Product;
use finfo;

class CartWebController extends Controller
{

    private $Cart;

    public function __construct(cartsRepositoryInterface $Carts){

        $this->Cart = $Carts; 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Cart->index();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'product_id'=>['int','required','exists:products,id'],
        //     'quantity'=>['int','nullable','min:1'],
        // ]);
        // $product= Product::findOrFail($request->post('product_id'));
        return $this->Cart->store($request);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->Cart->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->Cart->delete($id);
    }

    public function empty()
    {
        return $this->Cart->empty();
    }

}
