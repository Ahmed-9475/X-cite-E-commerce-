<?php

namespace App\Http\Controllers\Website;

use App\Interface\Carts\cartsRepositoryInterface;
use App\Interface\Checkout\checkoutRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutWebController extends Controller
{
    private $CheckOrder;
    private $cartRepository;


    public function __construct(checkoutRepositoryInterface $checkout,cartsRepositoryInterface $cartRepository ){

        $this->CheckOrder     = $checkout; 
        $this->cartRepository = $cartRepository;
    }


    public function index(){
        
        return $this->CheckOrder->index($this->cartRepository);
    }

    public function store(Request $request){

        return $this->CheckOrder->store($request,$this->cartRepository);

    }
}
