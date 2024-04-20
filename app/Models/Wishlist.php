<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table="wishlists";
    protected $fillable=[
        'name','email','product_tital','price','discount_price','image','product_id','user_id',
       ];
}
