<?php
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ContactFormController;
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

Route::view('/', 'home');

Route::get('contact',[ContactFormController::class,'create']);
Route::post('contact',[CustomersController::class,'store']);

Route::view('about', 'about');

Route::resource('customers', CustomersController::class);
/* Route::get('customers',[CustomersController::class,'index']);
Route::get('customers/create',[CustomersController::class,'create']);
Route::post('customers',[CustomersController::class,'store']);
Route::get('customers/{customer}',[CustomersController::class,'show']);
Route::get('customers/{customer}/edit',[CustomersController::class,'edit']);
Route::patch('customers/{customer}',[CustomersController::class,'update']);
Route::delete('customers/{customer}',[CustomersController::class,'destroy']); */
