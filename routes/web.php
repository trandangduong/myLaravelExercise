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

Route::view('/', 'welcome');
Route::view('contact-us', 'contact');
Route::view('about', 'about');

Route::get('customers',function(){
    $customers = [
        'Nguyen Van A',
        'Tran Van B',
        'C',
    ];
    return view ('internals.customers', [
        'customers' => $customers,
    ]);
});

/* Route::get('contact', function () {
    return view('contact');
});
Route::get('about', function () {
    return view('about');
}); */

