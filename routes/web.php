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
  // dd(env("APP_URL_PROD"));
   // dd(str_replace("/","",bcrypt(\Str::random(50))));
   $token = str_replace("/","",bcrypt(\Str::random(50)));
    return view('content.mails.event_report',compact('user','token'));
});

Route::get('/policy', function () {
      return view('welcome');
});



Route::get('/formulario',function(){

    return view('formulario');
});