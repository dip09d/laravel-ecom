<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Trait\Imageupload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class VendorController extends Controller
{
    use Imageupload;
    public function product(){
        $category=Category::all();
        return view('Vendor.product',compact('category'));
    }

    public function store(Request $request){
        $request->validate([
         'title'=>'required',
         'desc'=>'required',
         'quantity'=>'required',
         'price'=>'required',
        ]);
        if($request->image){
            $request->validate([
                'title'=>'required',
                'desc'=>'required',
                'quantity'=>'required',
                'price'=>'required', 
                'image'=>'required|mimes:png,jpg,jpeg,gif',
               ]);
        $imagepath=$this->insertimgae($request,'image','images');
        $category=Category::findOrFail($request->category_id);
        $category->products()->create([
         'title'=>$request->title,
         'desc'=>$request->desc,
         'quantity'=>$request->quantity,
         'price'=>$request->price,
         'discount_price'=>$request->discount_price,
         'image'=>$imagepath,
        ]);
    }else{
        $category=Category::findOrFail($request->category_id);
        $category->products()->create([
            'title'=>$request->title,
            'desc'=>$request->desc,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'discount_price'=>$request->discount_price
           ]);
    }
    
        return redirect()->route('vendor.product')->with('message','Product Added Successfully');
    }

    public function list(){
        $product=Product::all();
        return view('Vendor.productlist',compact('product'));
    }

    public function delete(Product $id){
        $id->delete();
        return redirect()->route('vendor.product.list')->with('message','Product Deleted Successfully');
    }

    public function edit(Product $id){
        $category=Category::all();
       return view('Vendor.edit',compact('id','category'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required',
            'desc'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'discount_price'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg,gif',
           ]);
           $imagepath=$this->updateImage($request,'image','images','image');
           $category=Category::findOrFail($request->category_id);
           $category->products()->where('id',$id)->update([
            'title'=>$request->title,
            'desc'=>$request->desc,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'discount_price'=>$request->discount_price,
            'image'=>$imagepath,
           ]);
           return redirect()->route('vendor.product.list')->with('message','Product Updateed Successfully');
    }
    public function advance(){
        return view('Vendor.advance');
    }
    public function Account_del(){
        return view('Vendor.account_delete');
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
        return view('Vendor.profile'); 
    }

    public function Profile_update(Request $request)
    {
       $role=$request->role;
       $imagpath=$this->insertimgae($request,'image','images');
       User::where('role',$role)->update([
       'name'=>$request->name,
       'email'=>$request->email,
       'image'=>$imagpath,
       ]);
       return redirect()->route('vendor.profile')->with('message','profile Updateed Successfully');
       
    }

    public function update_password(){
        return view('Vendor.updatepassword');
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

        return redirect()->route('vendor.update_password')->with('message','Password Update successfully');
    }
   

}
