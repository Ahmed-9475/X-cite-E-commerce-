<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\OrderCreatedNotification;

class SendOrderCreatedNotification
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
    public function handle($order = null): void
    {

        $user = User::where('store_id','=',$order->store_id)->first();
        $user->notify(new OrderCreatedNotification ($order));
    }
}
