<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\MultiPic;
use Carbon\Carbon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function allBrand(){
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

    public function addBrand(Request $request){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image'=>'required|mimes:jpg,jpeg,png'
        ],
            [

                'brand_name.required'=>'the category name is missing',
                'brand_name.unique'=>'category name is taken',
                    'brand_image.mimes'=>'the image not allowed'

            ]);

        $brand_image = $request->file('brand_image');
/*        $name_gen= hexdec(uniqid());
        $img_ext =strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'images/brand/';
        $last_img = $up_location.$img_name;
        $brand_image->move($up_location,$img_name);*/
        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        \Intervention\Image\Facades\Image::make($brand_image)->resize(300,200)->save('images/brand'.$name_gen);
        $last_img = 'images/brand'.$name_gen;
        Brand::insert([
           'brand_name'=>$request->brand_name,
            'brand_image'=>$last_img,
            'created_at'=>Carbon::now(),
        ]);
        $notification = array(
            'message'=>'brand inserted succesfully',
            'alert-type'=>'success',
        );

        return redirect()->back()->with($notification);



    }
    public function editBrand($id){
        /*    $categories= Category::find($id);*/
        //query builder //
        $brand = DB::table('brands')->where('id',$id)->first();
        return view('admin.brand.edit',compact('brand'));
    }
    public function updateBrand(Request $request,$id){
        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');
        if ($brand_image){
            $name_gen= hexdec(uniqid());
            $img_ext =strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'images/brand/';
            $last_img = $up_location.$img_name;
            $brand_image->move($up_location,$img_name);
            unlink($old_image);
            $update =  Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'brand_image'=>$last_img,
            ]);
            return Redirect()->back()->with('success','Brand inserted successfully');


        }else{
            $update =  Brand::find($id)->update(['brand_name'=>$request->brand_name,]);
                    return Redirect()->back()->with('success','Brand inserted successfully');
        }

    }
    public function deleteBrand($id){
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);
    Brand::find($id)->delete();
        return redirect()->back()->with('success','brand deleted Succesfully');


    }
    public function multiPic(){
        $images = MultiPic::all();
        return view('admin.multipic.index',compact('images'));
    }
    public function addImg(Request $request){

        $image = $request->file('image');
        foreach ($image as $multi_pic){
        $name_gen = hexdec(uniqid()).'.'.$multi_pic->getClientOriginalExtension();
        \Intervention\Image\Facades\Image::make($multi_pic)->resize(300,200)->save('images/multi/'.$name_gen);
        $last_img = 'images/multi/'.$name_gen;
        MultiPic::insert([
            'image'=>$last_img,
            'created_at'=>Carbon::now(),
        ]);
        }//endforeach
        return redirect()->back()->with('success','image inserted Succesfully');

    }
        public function logout(){
        Auth::logout();
    return    Redirect()->route('login')->with('success','logout succesfully');
        }

}
