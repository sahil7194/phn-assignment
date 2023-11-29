<?php

use App\Http\Controllers\EnquiryController;
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

Route::get('/', function () {
    return view('enquiry');
});

Route::post('/enquiry',[EnquiryController::class,'store']);

Route::get('/states',[EnquiryController::class,'getState']);
Route::get('/district',[EnquiryController::class,'getDistrict']);
