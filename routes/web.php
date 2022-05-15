<?php

use App\Models\User;
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

Route::get('/prueba', function () {
    $user = User::find(1);
   // dd(str_replace("/","",bcrypt(\Str::random(50))));
   $token = str_replace("/","",bcrypt(\Str::random(50)));
    return view('content.mails.user_register',compact('user','token'));
});
