<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
class GoogleController extends Controller
{
    public function googlelogin(){
        return Socialite::driver('google')->redirect();
    }
}
