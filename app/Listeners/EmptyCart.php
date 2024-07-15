<?php

namespace App\Listeners;

use App\Models\Cart;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Interface\Carts\cartsRepositoryInterface;

class EmptyCart
{
    private $cart;
    /**
     * Create the event listener.
     */
    public function __construct(cartsRepositoryInterface $Carts)
    {
        return $this->cart = $Carts;
    }

    /**
     * Handle the event.
     */
    public function handle($order=null): void
    {
        $this->cart->empty();
    }
}
