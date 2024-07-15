<?php
namespace App\Repository\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repository\Carts\cartsRepository;
use App\Interface\Carts\cartsRepositoryInterface;
use App\Interface\Checkout\checkoutRepositoryInterface;

class checkoutRepository implements checkoutRepositoryInterface{

    
    public function index(cartsRepositoryInterface $cart){


        if(count( $cart->getCartData()) == 0){
            return redirect()->route('/');
        }
        
        return view('Website.Home.checkout',compact('cart'));

    }

    public function store($request,cartsRepositoryInterface $cart){

        // return $request->post('addr');
        DB::beginTransaction();
        try{

            $cartData= $cart->getCartData()->groupBy('Product.store_id')->all();

            foreach($cartData as $store_id => $cart_items){
                $order = Order::create([
                    'user_id'=> auth()->user()->id,
                    'store_id'=>$store_id,
                ]);

                foreach($cart_items as $item){
                    OrderProduct::create([
                        'order_id'=>$order->id,
                        'product_id'=>$item->Product->id,
                        'product_name'=>$item->Product->name,
                        'price'=>$item->Product->price,
                        'quantity'=>$item->quantity,
                    ]);
                }

                // [add][billing][firsName]
                foreach($request->post('addr') as $type =>$address){
                    $address['type'] = $type;                
                    $order->addresses()->create($address);
                }

            }

            //$cart->empty();
            // make events to empty cart and decrement products quantity
            
            DB::commit();
            event('order.created',$order);
            return redirect()->route('home');
        }catch(\Exception $e){

            DB::rollBack();
            throw $e;
            // return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function update($request){
        
    }

}
