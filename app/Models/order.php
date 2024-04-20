<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $table="orders";
    protected $fillable=[
        'name','email','phone','address','product_tital','price','quantity','image','product_id','user_id','payment_status','delivery_status',
       ];

}
