<?php

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

use App\User;
use App\Post;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create',function(){
   $user=User::findOrFail(1);
   $post=new Post(['title'=>'My second post','content'=>'This is my second post']);
   $user->posts()->save($post);
});
Route::get('/read',function (){
    $user=User::find(1);
    foreach ($user->posts as $post){
        echo $post->title;
    }
});
Route::get('/update',function (){
   $user=User::find(1);
   $post=$user->posts()->where('id',1)->update(['title'=>'updated title','content'=>'updated content']);

});
Route::get('/delete',function(){
   $user=User::find(1);
   $user->posts()->where('id',1)->delete();
});
