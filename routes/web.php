<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\Home\HomeGetController;
use App\Http\Controllers\Frontend\Course\CourseListGetController;
use App\Http\Controllers\Frontend\Payment\PaymentGetController;
use App\Http\Controllers\Frontend\Payment\PaymentPostController;

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
/*
Route::get('/', function () {
    #return view('welcome');
    return view('payment');
});
*/
Route::get('/',  HomeGetController::class);
Route::get('/course/{course_id}',  CourseListGetController::class);
Route::get('/payment/{course_id}',  PaymentGetController::class);
Route::post('/payment',  PaymentPostController::class);
