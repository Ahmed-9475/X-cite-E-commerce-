<?php
namespace App\Interface\Carts;

use App\Models\Product;
use Illuminate\Support\Collection;

interface cartsRepositoryInterface 
{
    public function getCartData();
    // index  cart view
    public function index();

    // store  cart view
    public function store( $request);

    // update  cart view
    public function update( $request);
    
    // delete  cart view
    public function delete( $id);

    public function empty();
    public function total();
}