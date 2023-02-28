<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

use \App\Http\Controllers\PostsController;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
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
Route::get('/', [PostsController::class,'index']);

Route::get('posts/{post:slug}', [PostsController::class,'show']);

Route::get('author/{author:username}', function(User $author) {
    return view('posts.index', [
        'posts' => $author->posts,
    ]);
})->middleware('admin');

Route::get('register',[RegisterController::class,'register'])->middleware('guest');
Route::post('register',[RegisterController::class, 'store'])->middleware('guest');
Route::post('register',[RegisterController::class, 'store'])->middleware('guest');

Route::get('login',[SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class,'login'])->middleware('guest');
Route::post ('logout',[SessionsController::Class, 'destroy'])->middleware('auth');


