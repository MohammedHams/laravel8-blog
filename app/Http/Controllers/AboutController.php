<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function allAbout()
    {
        $abouts = HomeAbout::latest()->paginate(5);
        return view('admin.about.index', compact('abouts'));

    }

    public function addAbout(Request $request)
    {
        $validated = $request->validate([
            'about_title' => 'min:4',
            'about_short_desc' => 'min:4',
            'about_long_desc' => 'min:4'
        ]);
        HomeAbout::insert([
            'title' => $request->about_title,
            'short_desc' => $request->about_short_desc,
            'long_desc' => $request->about_long_desc,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('all.about')->with('success', 'about inserted succesfully');
    }

    public function editAbout($id)
    {
        $abouts = HomeAbout::find($id);
        return view('admin.about.edit', compact('abouts'));
    }

    public function updateAbout(Request $request, $id)
    {

            $update = HomeAbout::find($id)->update([
                'title' => $request->title,
                'short_desc' => $request->about_short_desc,
                'long_desc' => $request->about_long_desc,
            ]);
            return Redirect()->back()->with('success', 'about section updated successfully');
        }



    public function deleteAbout($id){
        HomeAbout::find($id)->delete();
        return redirect()->back()->with('success','About deleted Succesfully');

    }
    public function createAbout(){
        return view('admin.about.create');
    }

}
