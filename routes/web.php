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
    //dd($users);
    return view('users/index',compact('users'));

});

Route::get('post',function(){

});