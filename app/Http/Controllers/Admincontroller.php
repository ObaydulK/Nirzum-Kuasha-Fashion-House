<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Str;

class Admincontroller extends Controller
{
    //
    public function index(){
        return view('backend.index');
    }

    public function deshboard(){
        return view('backend.deshboard');
    }


    public function brands(){
        $brands = Brand::orderBy('id, DESC')->paginate(10);
        return view('backend.brand', compact('brands'));
    }

    public function addbrands(){
        return view('backend.addbrand');
    }

    public function BrandStore(Request $request){
        $request -> validate([
            'name' => 'required',
            'sulg' => 'required|unique:brands, slug',
            'image' => 'mimes: png, jpg, jpeg|max:4096',
        ]);
        $brand = new Brand;

        $brand->name= $request->name;
        $brand->slug = Str::slug($request->slug);

        $image = $request->file('image');
        $file_extention = $request->file('image')->extension();
        $file_name = Carbon::now()->timestamp.'.'.$file_extention;
        $this->GenerateBrandThumbailsImage($image, $file_name);

        $brand->image = $file_name;

        $brand->save();

        return redirect()->route('backend.brands')->with('success', 'Brand update success full');
    }

    public function GenerateBrandThumbailsImage($image, $imageName){
        $destinationPath = public_path('upload/brand');
        $img = Image::read($image->path);
        $img->cover(124, 124, "top" );
        $img->resize(124,124,function($constraint){
            $constraint->asperRotio();
        })->save($destinationPath.'/'.$imageName);
    }


}
