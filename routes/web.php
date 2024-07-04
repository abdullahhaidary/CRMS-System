<?php

use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
Route::middleware(['auth', 'lang'])->get('/',function(){

    return view('layout.home');
});
Route::get('language/{local}',function($local){
    app()->setLocale($local);
    session()->put('locale',$local);
    return redirect()->back();
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

//    Route::middleware([isAdmin::class])->get('crimnal-list',[\App\Http\Controllers\adminconroller::class, 'index'])->name('crimnal');
//});



//crimnal url
Route::get('/crimnal-list', [\App\Http\Controllers\criminalcontroller::class, 'index'])->name('crimnal');
Route::get('/criminal all information', [\App\Http\Controllers\criminalcontroller::class, 'more'])->name('criminal_all');
Route::get('/criminalcontroller-from', [\App\Http\Controllers\criminalcontroller::class, 'add'])->name('criminalcontroller-form');
Route::post('/crminal-from', [\App\Http\Controllers\criminalcontroller::class, 'inset'])->name('criminal-from');


 // url  complient
Route::get('/complint_list', [\App\Http\Controllers\complient::class, 'index'])->name('complint_list');
Route::get('/complint', [\App\Http\Controllers\complient::class, 'create'])->name('complint');
Route::post('/complint-form', [\App\Http\Controllers\complient::class, 'store'])->name('complint-from');


//url user
Route::get('/admin', [\App\Http\Controllers\admincontrol::class, 'index'])->name('user');
