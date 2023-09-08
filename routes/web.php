<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//jetstream
//normalade middleware, kişilerin login olmadan görmesini istemediğimiz yapıları tutar ve biz kendimiz yazarız.
//jetstream bunu bizim için otomatik olarak güvenli bir şekilde gerçekleştirir.

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    //kişilerin login olmadan görmesini istemediğimiz yapıları tutar.
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //kişilerin login olup olmadığını anlamak için buraya route yazarız.Yazalım bir tane:
    /*
    Route::get('/deneme',function (){
        return 5;
    });
    */

    //ekranda 5 görebilmemiz için giriş yapılması gerektiğinden url ye /deneme eklendiğinde login ekranına
    //yönlendirir bizi. Bu route u middleware dışına yazarsak ekranda 5 gösterir direkt.

});
