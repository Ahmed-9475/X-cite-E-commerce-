<?php
namespace App\Repository\Carts;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Interface\Carts\cartsRepositoryInterface;

class  cartsRepository implements cartsRepositoryInterface
{

    public function getCartData(){

        $cartDetails= Cart::with('Product')->where('cookie_id','=',$this->getCookieId())->get();
        return $cartDetails;
    }

    public function index(){
        
        $cartDetails= Cart::with('Product')->where('cookie_id','=',$this->getCookieId())
        ->get();
        return view('Website.Home.cart',compact('cartDetails'));
    }

    // store product inside  cart 
    public function store($request){

        $product_id= $request->input('product_id');
        $quantity= $request->input('productQuantity', 1);

         //Check if the product is already in shopping cart Or not
        $cartItem = Cart::where('cookie_id','=',$this->getCookieId())
        ->where('product_id','=',$product_id)->first();

        //If the product exists, increment the quantity by one
        if($cartItem){
            $cartItem->increment('quantity', $quantity);
        }else{
            //If the product is not there, add new in the shopping cart
            $cartItem =Cart::create([
                'cookie_id'=>$this->getCookieId(),
                'user_id'=> Auth::id(),
                'product_id'=> $product_id,
                'quantity'=> $quantity,
            ]);
            $cartItem->save();
        }
        return response()->json(['status' => $quantity . " " . $product_id . " added to cart"]);

    }

    // update  cart view
    public function update($request){

        $productId= $request->input('product_id');
        $quantity= $request->input('productQuantity');

        //Check if the product is already in shopping cart Or not
        $cartItem = Cart::with('Product')->where('cookie_id','=',$this->getCookieId())
        ->where('product_id','=',$productId)->first();

        if($cartItem){
        //update product quantity
            $cartItem->quantity = $quantity;
            $cartItem->save();
            //fetch price and compare price to update price inside shopping cart
            $discount = $cartItem->Product->compare_price;
            $newPrice = ($cartItem->Product->price - $discount) * $quantity ;
        }

        // check if data inside cookie 
        $newPriceCookie = Cookie::get('newPriceCookie');

        if(!$newPriceCookie){

            $newPriceCookie =  $newPrice;

            cookie::queue('newPriceCookie',$newPriceCookie);
        }


        // save update data (newPrice) with cookie

        return response()->json(['productId'=> $productId,'newPrice' => $newPrice,'discount'=>$discount,'newPriceCookie'=>$newPriceCookie ]);
 
    }
    
    // delete  cart view
    public function delete( $id){
        return Cart::where('id','=',$id)
        ->where('cookie_id','=',$this->getCookieId())
        ->delete();
    }

    public function empty(){
        return Cart::where('cookie_id','=',$this->getCookieId())->delete();
    }

    public function total(){
        return Cart::where('cookie_id','=',$this->getCookieId())
        ->join('products' ,'products.id','=','carts.product_id')
        ->selectRaw('SUM(products.price*carts.quantity) as total')
        ->value('total');
        ;
    }
    


    protected function getCookieId(){

        $cookie_id = Cookie::get('cookie_id');

        if(!$cookie_id){

            $cookie_id = Str::uuid();

            Cookie::queue('cookie_id',$cookie_id,30*24*60);
        }
        return $cookie_id;
    }
    
}