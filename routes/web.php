<?php

use Illuminate\Support\Facades\Route;

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

use App\Models\User;
use App\Models\Address;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users',function(){

    //User::factory()->count(5)->suspended()->create();

    //User::factory()->count(3)->create();
    //factory(\App\Models\User::class,3)->create();

    // Address::create([
    //     'user_id' => 2,
    //     'country' => 'England'
    // ]);

    // Address::create([
    //     'user_id' => 3,
    //     'country' => 'USA'
    // ]);

    $users = User::with('address','addresses')->get();

    // get those user who has created post
    $users = User::has('posts')->with('posts')->get();
   
    // get those user who have post with wildcard
    $users = User::whereHas('posts',function($query){
        $query->where('title','like','%Title%');
    })->with('posts')->get();

    // where does not have post
    $users = User::doesntHave('posts')->with('posts')->get();
    dd($users);
    return view('users/index',compact('users'));

});

Route::get('post',function(){
    // \App\Models\Post::create([
    //     'user_id' => 1,
    //     'title' => 'Title first of user 1 goes here',
    // ]);

    // \App\Models\Post::create([
    //     'user_id' => 1,
    //     'title' => 'Title second of user 1 goes here',
    // ]);

    // \App\Models\Post::create([
    //     'user_id' => 2,
    //     'title' => 'Title first of user 2 goes here',
    // ]);

    //$posts = \App\Models\Post::all();
    $posts = \App\Models\Post::with('user','tags')->get();
    //dd($posts);
    return view('posts/index',compact('posts'));
});

// many to many relationship between post and tag

Route::get('post-tag',function(){

    // \App\Models\Tag::create([
    //     'name' => 'PHP',
    // ]);

    // \App\Models\Tag::create([
    //     'name' => 'Javascript',
    // ]);

    // \App\Models\Tag::create([
    //     'name' => 'React',
    // ]);

    // \App\Models\Tag::create([
    //     'name' => 'Mongo',
    // ]);
        $tag = \App\Models\Tag::first();
        $post = \App\Models\Post::first();
         //$post->tags()->detach($tag);
         //$post->tags()->sync($tag);
        //$post->tags()->attach($tag);
        //$post->tags()->attach([2,3]);
});

Route::get('tags',function(){

    $tags = App\Models\Tag::with('posts')->get();
    return view('tags/tags',compact('tags'));
});

