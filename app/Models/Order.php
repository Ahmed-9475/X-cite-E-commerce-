<?php

namespace App\Models;

use App\Models\OrderAddresses;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    public $fillable = ['user_id','store_id','orderNumber'];


    //******* relations ******* ///

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function user(){

        return $this->belongsTo(User::class)->withDefault();
    }

    public function products(){
        return $this->belongsToMany(Product::class,'Order_product','order_id','product_id','id','id')
        ->using(OrderProduct::class)
        ->withPivot(['product_name','price','quantity']);
    }
    public function addresses(){
        return $this->hasMany(OrderAddresses::class);
    }

    public function billingAddress(){

        return $this->hasOne(OrderAddresses::class,'order_id','id')
        ->where('type','=','billing');
    } 

    public function shippingAddress(){

        return $this->hasOne(OrderAddresses::class,'order_id','id')
        ->where('type','=','shipping');
    } 

    //** make observer to create order Number */

    public static function booted(){
        static::creating(function(Order $order){
            //2024001 2024002
            $order->orderNumber = Order::getNextOrderNumber();
        });
    }

    public static function getNextOrderNumber(){
        $year = Carbon::now()->year;
        $number = Order::whereYear('created_at','=',$year)->max('orderNumber');

        if($number){
            return $number +1;
        }
        return $year.'001';
    }
    
}
