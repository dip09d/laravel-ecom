<?php

namespace App\Http\Controllers;

use App\Events\MailSent;
use App\Models\Add_Cart;
use App\Models\Address;
use App\Models\order;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Monolog\Handler\AbstractHandler;
use Session;
use Stripe;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){
        $product=Product::paginate(6);
    return view('Home.Userhome',compact('product'));
    }

    public function all_product(){
        $product=Product::paginate(6);
        return view('Home.all_product',compact('product'));
    }
    
    public function product_search(Request $request){
        // $product=Product::paginate(6);
        $searchproduct=$request->product_search;
        $product=Product::where('title','LIKE',"%$searchproduct%")->get();
        return view('Home.all_product',compact('product'));
    }
    public function redirect(){
        if (Auth::user()->role=='admin') {
            return view('Admin.home');
        }elseif (Auth::user()->role=='vendor') {
            return view('Vendor.home');
        }else{
            $product=Product::paginate(6);
         return view('Home.Userhome',compact('product'));
        }
    }

    public function profile(){
        return view('Home.profile');
    }

    public function product_details(Product $id){
    return view('Home.product_details',compact('id'));
    }

    

    public function add_cart(Request $request,$id){
       if (Auth::id()) {
        $user=Auth::user();
        $userid=$user->id;
        $product=Product::find($id);
        $product_exist_id=Add_Cart::where('product_id',$id)->where('user_id',$userid)->get('id')->first();
        if ($product_exist_id) {
            $cart=Add_Cart::find($product_exist_id)->first();
            $quantity=$cart->quantity;
            $cart->quantity=$quantity+$request->quantity;
            if ($product->discount_price!=null) {
                $cart->price=$product->discount_price*$cart->quantity;
            } else {
                $cart->price=$product->price*$cart->quantity;
            }
            
            $cart->save();
            return redirect()->back();
        }else{
            Add_Cart::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'phone'=>$user->phone,
                'address'=>$user->address,
                'user_id'=>$user->id,
                'product_tital'=>$product->title,
                'price'=>$request->price*$request->quantity,
                'quantity'=>$request->quantity,
                'image'=>$product->image,
                'product_id'=>$product->id,
                ]);
                return redirect()->route('product.show_cart');
        }
        
       }else{
       return redirect()->route('login');
       }
       
    }

    public function show_cart(){
        if (Auth::id()) {
        $id=Auth::user()->id;
        $address=Address::where('user_id',$id)->first();
        $cart=Add_Cart::where('user_id',$id)->get();
        return view('Home.cart',compact('cart','address'));
        }else{
        return redirect()->route('login');
        }
    }
    public function update_cart(Add_Cart $id){
        return view('Home.updatecart',compact('id'));
    }

    public function update(Request $request ,Add_Cart $id){
     $id->update([
      'quantity'=>$request->quantity,
      'price'=>$request->price*$request->quantity,
     ]);
     return redirect()->route('product.show_cart')->with('message','Item update Successfully');
    }
    public function delete(Add_Cart $id){
    $id->delete();
    return redirect()->route('product.show_cart')->with('message','Item Remove Successfully');
    }
    public function order(){
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
                'payment_status'=>'cash on delivery',
                'delivery_status'=>'panding',
            ]);
          $cart_id=$datas->id;
           $cart=Add_Cart::find($cart_id);
           $cart->delete();
        }
        return redirect()->back()->with('message','Order Has Been Completed');

    }
    public function wishlists(){
        $user=Auth::user();
        $userid=$user->id;
        $wishlist=Wishlist::where('user_id',$userid)->get();
        return view('Home.wishlist',compact('wishlist'));
    }

    public function add_wislists(Request $request,$id){
     
            $user=Auth::user();
            $product=Product::where('id',$id)->first();
            Wishlist::create([
            'name'=>$user->name,
            'email'=>$user->email,
            'user_id'=>$user->id,
            'product_tital'=>$product->title,
            'price'=>$product->price,
            'discount_price'=>$product->discount_price,
            'image'=>$product->image,
            'product_id'=>$product->id,
            ]);
            return redirect()->back();
           
    }

    public function remove_wislists(Wishlist $id){
     $id->delete();
     return redirect()->route('home.wishlists')->with('message','Wishlists remove');
    }

    public function adress(){
        $id=Auth::user()->id;
        $user=User::where('id',$id)->first();
        return view('Home.Adress',compact('user'));
    }
    public function store_address(Request $request){
       $id=Auth::user()->id;
       $user=User::where('id',$id)->first();
        $user->address()->create([
            'city'=>$request->city,
            'state'=>$request->state,
            'landmark'=>$request->landmark,
            'zip'=>$request->zip,
            ]);


        return redirect()->route('user.adress')->with('message','Adress Added Successfully');
        
      
    }

    public function paidorder(Request $request){
        $total_price=$request->total_price;
        return view('Home.paidorder',compact('total_price'));
        
    }

    public function my_order()
    {
        if (Auth::id()) {
            $user=Auth::user();
            $userid=$user->id;
            $myorder=order::where('user_id',$userid)->get();
            return view('Home.myorder',compact('myorder'));
        }
        else{
            return redirect('login');
        }
    }

    public function cancel_order($id){
        $order=order::find($id);
        $order->delivery_status="You Cancel The Order";
        $order->save();
        return redirect()->back();
    }

    
    // public function stripe(Request $request){
    //    \Stripe\Stripe::setApiKey(config('stripe.sk'));
    //    $response=\Stripe\Checkout\Session::create([
    //     "line_items"=>[
    //         "price_data"=>[
    //             "currency" =>"usd",
    //             "product_data"=>[
    //                 'name'=>"Add to Cart",
    //             ],
    //             "unit_amount"=>$request->total_price *100,
    //         ],
    //         "quantity"=>1,
    //     ],
    //     "mode"         =>"payment",
    //     "success_url"=>route('stripe.success'),
    //     "cancel_url"=>route('stripe.cancel'),
    // ]);
    // return redirect()->away($request->url);
    // }

    // public function stripeSuccsee()
    // {
        
    // }
    // public function stripeCancel()
    // {
        
    // } 
}
