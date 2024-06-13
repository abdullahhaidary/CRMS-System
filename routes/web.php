<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
Route::middleware('auth')->get('/',function(){

    return view('layout.home');
});
Route::get('/login',[AuthController::class,'login_page'])->name('login');
Route::get('register',[AuthController::class,'register_page'])->name('register');
Route::get('/forgot-password', [AuthController::class, 'forget_page'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forget']);
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::post('/forgot-password',[AuthController::class,'forget'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}',[AuthController::class,'forget_token'])->middleware('guest')->name('password.reset');
Route::post('/profile_change',[AuthController::class,'profile_change'])->middleware('auth')->name('profile_change');
Route::post('/profile-info-edit',[AuthController::class,'profile_info_edit'])->middleware('auth')->name('profile_info_edit');

Route::post('/reset-password',[AuthController::class,'forget_password'])->middleware('guest')->name('password.update');
Route::post('logout',[AuthController::class,'logout'])->name('logout');
Route::post('profile-complete',[AuthController::class,'complete_profile'])->name('profile.complete');
Route::fallback(function(){
    return view('massage');
})->middleware('auth');

// admin Route
//Route::group(['middleware'=>'adminmidleware'],function (){

    Route::get('crimnal-list',[\App\Http\Controllers\adminconroller::class, 'index'])->middleware('admin-middleware')->name('crimnal');

//});







