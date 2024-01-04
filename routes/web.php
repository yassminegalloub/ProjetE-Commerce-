<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


route::get('/redirect',[HomeController::class,'redirect']);

route::get('/',[HomeController::class,'index']);

route::get('/product',[AdminController::class,'product']);

route::post('/uploadproduct',[AdminController::class,'uploadproduct']);

route::get('/showproduct',[AdminController::class,'showproduct']);

route::get('/showuser',[AdminController::class,'showuser']);

route::get('/updateuser/{id}',[AdminController::class,'updateuser']);

route::post('/confirmupdate/{id}',[AdminController::class,'confirmupdate']);

route::get('/deleteuser/{id}',[AdminController::class,'deleteuser']);


route::get('/deleteproduct/{id}',[AdminController::class,'deleteproduct']);

route::get('/updateview/{id}',[AdminController::class,'updateview']);

route::post('/updateproduct/{id}',[AdminController::class,'updateproduct']);

route::get('/search',[HomeController::class,'search']);


route::get('/contactus',[HomeController::class,'contactus']);

route::get('/allproduct',[HomeController::class,'allproduct']);

route::post('/addcart/{id}',[HomeController::class,'addcart']);

route::get('/showcart',[HomeController::class,'showcart']);

route::post('/sendmessage',[HomeController::class,'sendmessage']);

route::get('/showmessage',[AdminController::class,'showmessage']);



route::get('/delete/{id}',[HomeController::class,'deletecart']);

route::post('/order',[HomeController::class,'confirmorder']);

route::get('/showorder',[AdminController::class,'showorder']);

route::get('/updatestatus/{id}',[AdminController::class,'updatestatus']);







