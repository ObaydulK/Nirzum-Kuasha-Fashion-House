<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Str;
use Validator;

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
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('backend.brand', compact('brands'));
    }

    public function addbrands(){
        return view('backend.addbrand');
    }
// brand store part 
    public function brandstore(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'slug' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $Brands = new Brand;
        $Brands->name = $request->name;
        $Brands->slug = $request->slug;
        $Brands->image = $request->image;
        $Brands->save();
       
       return redirect()->route('backend.brands')->with('status','Record has been added successfully !');
   }

// Brand edit part
   public function brandedit($id){
    $Brand = Brand::find($id);
     return view('backend.editbrand', compact('Brand'));

   }

//    Brand update part 
   public function brandupdate(Request $request, $id){
     

    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]); 

    $brands = Brand::findOrFail($id);
    $brands->update($request->all());
   
   return redirect()->route('backend.brands')->with('status','Update has been added successfully !');
   }







//    Brand Disrtoy part 
   public function branddestry(Request $request, $id){
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('backend.brands')->with('status','Record has been added successfully !');
   }

}
