<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;



class CategoryController extends Controller
{
        public function __construct(){
            $this->middleware('auth');
        }
    public function allCat(){
        //Eloquent//
  $categories = Category::latest()->paginate(5);
    $trashCat = Category::onlyTrashed()->latest()->paginate(5);
        //Query Builder//
/*        $categories = DB::table('categories')
            ->join('users','categories.user_id','users.id')
            ->select('categories.*','users.name')
            ->latest()->paginate(5);*/
        return view('admin.category.index',compact('categories','trashCat'));
    }
    public function addCat(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
            [

            'category_name.required'=>'the category name is missing',
            'category_name.unique'=>' category name is taken'
        ]);

  Category::insert(
        [
            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
            'created_at'=>Carbon::now(),
        ]
    );
          return Redirect()->back()->with('success','category inserted successfully');


/*    $category = new Category() ;
    $category ->category_name = $request ->category_name;
        $category -> user_id =Auth::user()->id;
        $category ->save();*/

/*        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::Table('categories')->insert($data);*/
    }
    public function editCat($id){
/*    $categories= Category::find($id);*/
    //query builder //
        $categories = DB::table('categories')->where('id',$id)->first();
    return view('admin.category.edit',compact('categories'));
    }
    public function updateCat(Request $request,$id){
    $update =  Category::find($id)->update([
          'category_name'=>$request->category_name,
          'user_id'=>Auth::user()->id,
      ]);

        //query Builder //
/*$data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::Table('categories')->where('id',$id)->update($data);*/
       return     redirect()->route('all.category')->with('success','category is updated');
    }

    public function SoftDelete($id){
        $delete = Category::find($id)->delete();
        return redirect()->back()->with('success','category deleted Succesfully');
    }
    public function Restore($id){
        $delete = Category::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success','category restored Succesfully');

    }
    public function pdelete($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success','Category Deleted Permanently Succesfully');

    }
}
