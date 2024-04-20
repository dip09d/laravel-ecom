<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\order;
use App\Models\Product;
use App\Trait\Imageupload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class AdminController extends Controller
{
  use Imageupload;
    public function category(){
      if (Auth::id()) {
        $category=Category::all();
        return view('Admin.category' ,compact('category')); 
      } else {
        return redirect("login");
      }
    }

    public function store(Request $request){
        $request->validate([
          'name'=>['required', 'unique:'.Category::class]
        ]);
     Category::create([
      'name'=>$request->name,
      'slug'=>Str::slug($request->name),
     ]);
     return redirect()->route('admin.category')->with('message','Category Added Successfully');
    }

    public function delete(Category $id){
      $id->delete();
      return redirect()->route('admin.category')->with('message','Category Delete Successfully');
    }

    public function product_view(){
      if (Auth::id()) {
        $product=Product::all();
      return view('Admin.product_view',compact('product'));
      }
      else {
        return redirect("login");
      }
    }
    public function advance(){
      return view('Admin.advance');
    }

    public function admin_delete(){
    return view('Admin.account_del');
    }
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function profile(){
      return view('Admin.profile'); 
  }

  public function Profile_update(Request $request)
  {
     $role=$request->role;
     $imagpath=$this->updateImage($request,'image','images','image');
     User::where('role',$role)->update([
     'name'=>$request->name,
     'email'=>$request->email,
     'image'=>$imagpath,
     ]);
     return redirect()->route('admin.profile')->with('message','profile Updateed Successfully');
     
  }

  public function update_password(){
      return view('Admin.updatepass');
  }

  public function password_reset(Request $request): RedirectResponse
  {
      $validated = $request->validateWithBag('updatePassword', [
          'current_password' => ['required', 'current_password'],
          'password' => ['required', Password::defaults(), 'confirmed'],
      ]);

      $request->user()->update([
          'password' => Hash::make($validated['password']),
      ]);

      return redirect()->route('admin.update_password')->with('message','Password Update successfully');
  }

  public function order(){
    $orders=order::all();
    return view('Admin.order',compact('orders'));
  }

  public function searchorder(Request $request){
   $searchtext=$request->search;
   $orders=order::where('name','LIKE',"%$searchtext%")->orwhere('phone','LIKE',"%$searchtext%")
   ->orwhere('price','LIKE',"%$searchtext%")->orwhere('address','LIKE',"%$searchtext%")
   ->orwhere('email','LIKE',"%$searchtext%")->orwhere('product_tital','LIKE',"%$searchtext%")->get();
   return view('Admin.order',compact('orders'));
  }

  public function order_action($id){
   $order=order::find($id);
   $order->delivery_status="Delivered";
   $order->payment_status="Paid";
   $order->save();
   return back();
  }

  public function print_pdf($id){

    $order=order::find($id);

    $pdf = PDF::loadView('Admin.pdf',compact('order'));
    return $pdf->download('order_details.pdf');
  }
  public function dashboard(){
    $product=Product::count();
    $order=order::count();
    $user=User::where('role','user')->count();
    $delivered=order::where('delivery_status','Delivered')->count();
    $panding=order::where('delivery_status','panding')->count();
    $total_Revenue=order::all();
    $total_price=0;
    foreach ($total_Revenue as $price) {
      $total_price=$total_price + $price->price;
    }
    $today_order=order::whereDay('created_at',18)->count();

    $today_sell=order::whereDay('created_at',18)->get('price');
    $today_Revenue=0;
    foreach ($today_sell as $revenue) {
      $today_Revenue=$today_Revenue + $revenue->price;
    }

    return view('Admin.deshboard',compact('product','order','user','delivered','panding','total_price','today_order','today_Revenue'));
  }
}
