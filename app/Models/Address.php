<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table="addresses";

    protected $fillable=[
     'user_id','city','state','landmark','zip',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
