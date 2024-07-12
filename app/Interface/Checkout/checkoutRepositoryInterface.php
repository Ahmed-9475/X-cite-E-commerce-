<?php
namespace App\Interface\Checkout;

use App\Repository\Carts\cartsRepository;
use App\Interface\Carts\cartsRepositoryInterface;


interface checkoutRepositoryInterface 
{
    // index  Checkout view
    public function index(cartsRepositoryInterface $cart);

    // store  Checkout view
    public function store( $request,cartsRepositoryInterface $cart);

    // update  Checkout view
    public function update( $request);
    
}