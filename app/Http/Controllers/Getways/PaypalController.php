<?php

namespace App\Http\Controllers\Getways;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;
use App\Models\Add_Cart;
use App\Models\order;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function paypal(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $responce= $provider->createOrder([
            "intent"=>"CAPTURE",
            "application_context"=>[
                "return_url"=>route('paypal.success'),
                "cancel_url"=>route('paypal.cancel'),
            ],
            "purchase_units"=>[
                [
                    "amount"=>[
                        "currency_code"=>"USD",
                        "value"=>$request->total_price,
                    ]
                ]
            ]
                    ]);
        if (isset($responce['id']) && $responce['id'] != null) {
           foreach($responce['links'] as $link){
             if ($link['rel']=='approve') {
                return redirect()->away($link['href']);
             }
           }
        }else{
            return redirect()->route('paypal.cancel');
        }
    }
    public function success(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response=$provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status']=='COMPLETED') {
            $user=Auth::user();
        $userid=$user->id;
        $data=Add_Cart::where('user_id',$userid)->get();
        foreach ($data as $datas) {
            order::create([
                'name'=>$datas->name,
                'email'=>$datas->email,
                'phone'=>$datas->phone,
                'address'=>$datas->address,
                'user_id'=>$datas->user_id,
                'product_tital'=>$datas->product_tital,
                'price'=>$datas->price,
                'quantity'=>$datas->quantity,
                'image'=>$datas->image,
                'product_id'=>$datas->id,
                'payment_status'=>'paid',
                'delivery_status'=>'panding',
            ]);
          $cart_id=$datas->id;
           $cart=Add_Cart::where('id',$cart_id)->first();
           $cart->delete();
            return redirect()->route('paidorder.user')->with('order','Paid Successfully');
        }
            return redirect()->route('paypal.cancel');
        
    }
}
    public function cancel(){
        return redirect()->route('paidorder.user')->with('cancel','Payment Failed');
    }
}
