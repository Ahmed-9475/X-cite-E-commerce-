<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    public $fillable=['cookie_id','quantity','user_id','product_id','option'];


    public function User(){

        //return $this->belongsTo(User::class);
    }

    public function Product(){

        return $this->belongsTo(Product::class);
    }

    // create id [type=>uuid] before create cart 
    protected static function booted()
    {
        static::creating(function(Cart $Cart){
            $Cart->id= Str::uuid();
        });
    }

}
