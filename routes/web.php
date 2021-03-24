<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

use App\Models\Post;
use App\Models\User;
use \App\Models\Country;

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

Route::resource('', HomeController::class);
Route::resource('contacts', ContactController::class);
Route::resource('post', PostController::class);


Route::get('/insert', function (){
    DB::insert('insert into posts(title, body, slug) values(?, ?, ?)', ['PhP with Laravel number 2', 'Laravel body 2', 'phplaravel2']);
});

//Route::get('/read', function (){
//    $posts = Post::all();
//
//    foreach ($posts as $post){
//        return $post -> title;
//    }
//
//});
//
//Route::get('/find', function (){
//    $post = Post::find(1);
//    return $post -> body;
//});
//

Route::get('/find', function (){
    $posts = Post::where('id', 2) -> orderBy('id', 'desc') -> take(1) -> get();

    return $posts;
});

//Route::get('/basicinsert', function (){
//    $post = new Post;
//
//    $post -> title = 'New post insert';
//    $post -> body = 'New post body';
//    $post -> slug = 'newpost';
//
//    $post -> save();
//});


//access the pivot tables (intermediate table)
Route::get('user/pivot', function (){
    $user = User::find(1);

    foreach ($user->roles as $role){
        echo $role->pivot;
    }
});

Route::get('/user/{id}/role', function ($id){
//    $user = User::find($id);
//
//    foreach ($user->roles as $role){
//        return $role->name;
//    }
    $user = User::find($id)->roles()->orderBy('id', 'desc')->get();
    return $user;
});

Route::get('/post/country/{id}', function ($id){
    $country = Country::find($id);
    foreach ($country->posts as $post){
        return $post->title;
    }
//    return $country;
});

Route::get('/country/post/{id}', function($id){
    $post = Post::find($id);

    return $post->user;
});

Route::get('/post/{id}/user', function ($id){
    $user = Post::find($id)->user;
   return  $user;
});
