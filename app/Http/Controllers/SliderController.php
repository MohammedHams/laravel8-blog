<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function allSlider()
    {
        $sliders = Slider::latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));

    }

    public function addSlider(Request $request)
    {
        $validated = $request->validate([
            'slider_title' => 'min:4',
            'slider_desc' => 'min:4',
            'slider_image' => 'mimes:jpg,jpeg,png'
        ]);
        $slider_image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()) . '.' . $slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920, 1088)->save('images/slider' . $name_gen);
        $last_img = 'images/slider' . $name_gen;
        Slider::insert([
            'title' => $request->slider_title,
            'description' => $request->slider_desc,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success', 'slider inserted succesfully');
    }

    public function editSlider($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function updateSlider(Request $request, $id)
    {
        $old_image = $request->image;
        $slider_image = $request->file('image');
        if ($slider_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($slider_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'images/slider/';
            $last_img = $up_location . $img_name;
            $slider_image->move($up_location, $img_name);
            unlink($old_image);
            $update = Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
            ]);
            return Redirect()->back()->with('success', 'slider updated successfully');
        }
        else
        {
            $update = Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,

                ]);
            return Redirect()->back()->with('success', 'Slider updated successfully');

        }
    }

public function deleteSlider($id){
    $image = Slider::find($id);
    $old_image = $image->image;
    unlink($old_image);
    Slider::find($id)->delete();
    return redirect()->back()->with('success','slider deleted Succesfully');

}
public function createSlider(){
        return view('admin.slider.create');
}
}
