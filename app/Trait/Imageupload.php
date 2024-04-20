<?php

namespace App\Trait;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

trait Imageupload
{
    public function insertimgae(Request $request,$inputname,$path){
     if ($request->hasFile($inputname)) {
        $image=$request->{$inputname};
        $ext=$image->getClientOriginalExtension();
        $imagename='media_'.uniqid().'.'.$ext;
        $image->move(public_path($path),$imagename);
        return $path.'/'.$imagename;

     }
    }
    public function updateImage(Request $request,$inputname,$path,$oldpath=null){
        if ($request->hasFile($inputname)) {
            if(File::exists(public_path($oldpath))){
                File::delete(public_path($oldpath));
            } 
            $image=$request->{$inputname};
            $ext=$image->getClientOriginalExtension();
            $imagename='media_'.uniqid().'.'.$ext;
            $image->move(public_path($path),$imagename);
            return $path.'/'.$imagename;
            
        }
    }

    public function deleteimage(string $path){
        if(File::exists(public_path($path))){
            File::delete(public_path($path));
        } 
    }
}


