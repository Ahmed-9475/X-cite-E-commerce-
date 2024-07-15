<?php

namespace App\Listeners;

use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DecrementProductsQuantity
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($order=null): void
    {
        foreach($order->products as $product){
            
            $product->decrement('quantity',$product->pivot->quantity);
        }
    }
}
