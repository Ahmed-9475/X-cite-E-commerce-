<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddresses extends Model
{
    use HasFactory;

    public $fillable = ['order_id','type','first_name','last_name','email','phone_number','city','street','more_details'];

}
