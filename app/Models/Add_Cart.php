<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add_Cart extends Model
{
    use HasFactory;

    protected $table="add__carts";

    protected $fillable=[
     'name','email','phone','address','product_tital','price','quantity','image','product_id','user_id',
    ];
}
