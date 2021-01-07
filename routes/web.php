<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\PostsController;
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

Route::get('/addPost',[PostsController::class,'addPost']);

Route::post('/addPost',[PostsController::class,'storePost'])->name('post_store');

Route::get('/allPosts',[PostsController::class,'posts']);

Route::get('/editPost/{post_id}',[PostsController::class,'editPost']);

Route::post('/updatePost',[PostsController::class,'updatePost'])->name('update_post');

Route::get('/deletePost/{post_id}',[PostsController::class,'deletePost']);

/*Route::post('/create_post',function(Request $request){
	dd($request->all());

})->name('create_post');*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum','verified'])->get('/create_token','PostsController@create_token')->name('create_token');