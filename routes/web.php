<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use App\Models\MultiPic;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    return view('index',compact('brands'));
})->name('welcome');

#############################Category Routes##################################

Route::get('category/all',[CategoryController::class,'allCat'])->name('all.category');
Route::post('category/store',[CategoryController::class,'addCat'])->name('store.category');
Route::get('category/edit/{id}',[CategoryController::class,'editCat'])->name('edit.category');
Route::post('/category/update/{id}',[CategoryController::class,'updateCat'])->name('update.category');
Route::get('/category/softdelete/{id}',[CategoryController::class,'SoftDelete'])->name('edit.category');
Route::get('/category/restore/{id}',[CategoryController::class,'Restore'])->name('restore.category');
Route::get('category/pdelete/{id}',[CategoryController::class,'pdelete'])->name('pdelete.category');

#############################Brand Routes##################################

Route::get('brand/all',[BrandController::class,'allBrand'])->name('all.brand');
Route::post('brand/store',[BrandController::class,'addBrand'])->name('store.brand');
Route::get('brand/edit/{id}',[BrandController::class,'editBrand'])->name('edit.brand');
Route::post('/brand/update/{id}',[BrandController::class,'updateBrand'])->name('update.brand');
Route::get('/brand/delete/{id}',[BrandController::class,'deleteBrand'])->name('delete.brand');
Route::get('image/all',[BrandController::class,'multiPic'])->name('multi.image');
Route::post('image/store',[BrandController::class,'addImg'])->name('store.image');

#############################Admin Dashboard Routes##################################

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');
Route::get('user/logout',[BrandController::class,'logout'])->name('user.logout');

#############################Slider Routes##################################

Route::get('slider/all',[SliderController::class,'allSlider'])->name('all.slider');
Route::get('slider/create',[SliderController::class,'createSlider'])->name('create.about');
Route::post('slider/store',[SliderController::class,'addSlider'])->name('store.slider');
Route::get('slider/edit/{id}',[SliderController::class,'editSlider'])->name('edit.slider');
Route::post('slider/update/{id}',[SliderController::class,'updateSlider'])->name('update.slider');
Route::get('slider/delete/{id}',[SliderController::class,'deleteSlider'])->name('delete.slider');

#############################aboutus Routes##################################

Route::get('about/all',[AboutController::class,'allAbout'])->name('all.about');
Route::get('about/create',[AboutController::class,'createAbout'])->name('create.about');
Route::post('about/store',[AboutController::class,'addAbout'])->name('store.about');
Route::get('about/edit/{id}',[AboutController::class,'editAbout'])->name('edit.about');
Route::post('about/update/{id}',[AboutController::class,'updateAbout'])->name('update.about');
Route::get('about/delete/{id}',[AboutController::class,'deleteAbout'])->name('delete.about');
