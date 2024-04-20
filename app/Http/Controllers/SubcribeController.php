<?php

namespace App\Http\Controllers;
use App\Events\MailSent;
use Illuminate\Http\Request;

class SubcribeController extends Controller
{

   
    public function subcribe(Request $request){
        $email=$request->email;
        event(new MailSent($email));
        return redirect()->back();
    }

}
