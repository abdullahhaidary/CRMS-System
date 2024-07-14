<?php

use App\Http\Controllers\suspectController;
use App\Http\Middleware\isAdmin;
use App\Models\suspectmodel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\FingerprintModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
Route::middleware(['auth', 'lang'])->get('/',function(){

    return view('layout.home');
})->name('home');
Route::get('language/{local}',function($local){
    app()->setLocale($local);
    session()->put('locale',$local);
    return redirect()->back();
});


//Route::group(['middleware'=>'auth'],function (){
//url search
Route::get('/search',function(){
    return view('search');
})->name('bio_search');
Route::get('search/search', [\App\Http\Controllers\searchcontroller::class, 'index'])->name('search');



//url Auth
Route::get('/login',[AuthController::class,'login_page'])->name('login');
Route::get('register',[AuthController::class,'register_page'])->name('register');
Route::get('/forgot-password', [AuthController::class, 'forget_page'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forget']);
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/register',[AuthController::class,'register'])->name('register');
//});
Route::post('/forgot-password',[AuthController::class,'forget'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}',[AuthController::class,'forget_token'])->middleware('guest')->name('password.reset');
Route::post('/profile_change',[AuthController::class,'profile_change'])->middleware('auth')->name('profile_change');
Route::post('/profile-info-edit',[AuthController::class,'profile_info_edit'])->middleware('auth')->name('profile_info_edit');

Route::get('/profile', [AuthController::class, 'profile_info'])->middleware('auth')->name('profile_info');


Route::post('/reset-password',[AuthController::class,'forget_password'])->middleware('guest')->name('password.update');
Route::post('logout',[AuthController::class,'logout'])->name('logout');
Route::post('profile-complete',[AuthController::class,'complete_profile'])->name('profile.complete');
Route::get('change/password/{id}', function (){
    return view('profile.change_password');
});
Route::post('password/change', [AuthController::class, 'update_password'])->name('change_password');
Route::fallback(function(){
    return view('massage');
})->middleware('auth');


// admin Route
//Route::group(['middleware'=>'adminmidleware'],function (){

//    Route::middleware([isAdmin::class])->get('crimnal-list',[\App\Http\Controllers\adminconroller::class, 'index'])->name('crimnal');
//});



//crimnal url
Route::get('/crimnal-list', [\App\Http\Controllers\criminalcontroller::class, 'index'])->name('crimnal');
Route::get('/criminal/all/{id}', [\App\Http\Controllers\criminalcontroller::class, 'more'])->name('criminal_all');
Route::get('/criminalcontroller-from', [\App\Http\Controllers\criminalcontroller::class, 'add'])->name('criminalcontroller-form');
Route::post('/crminal-from', [\App\Http\Controllers\criminalcontroller::class, 'inset'])->name('criminal-from');
Route::get('criminal/edit/{id}', [\App\Http\Controllers\criminalcontroller::class, 'edit'])->name('criminal_edit');
Route::post('criminal/edit/{id}', [\App\Http\Controllers\criminalcontroller::class, 'update'])->name('criminal_update');



//url user
Route::get('/admin', [\App\Http\Controllers\admincontrol::class, 'index'])->name('user')->middleware('auth');
Route::get('/admin/edit/{id}', [\App\Http\Controllers\admincontrol::class, 'edit'])->name('user_edit')->middleware('auth');
Route::post('admin/update/{id}', [\App\Http\Controllers\admincontrol::class, 'update'])->name('user_update')->middleware('auth');

//url people
Route::get('/people', [\App\Http\Controllers\pepolecontroller::class, 'index'])->name('people');
Route::get('/people_from', [\App\Http\Controllers\pepolecontroller::class, 'create'])->name('people_form');
Route::post('/people_from', [\App\Http\Controllers\pepolecontroller::class, 'store'])->name('people-store');
Route::get('/ariza/arizafile/{id}', [\App\Http\Controllers\pepolecontroller::class, 'ariza'])->name('artiza_file');


//url crime record information

Route::get('crime/info/{id}', [\App\Http\Controllers\crime_register_record_information::class, 'index'])->name('crime_info');


//url department
//Route::group(['middleware'=>'isAmin'], function (){
Route::get('/department', [\App\Http\Controllers\departmentContoller::class, 'index'])->name('department');
Route::get('/department form', [\App\Http\Controllers\departmentContoller::class, 'create'])->name('department_form');
Route::post('/department form', [\App\Http\Controllers\departmentContoller::class, 'store'])->name('department_form');

//ulr cases
Route::get('/case/{id}', [\App\Http\Controllers\casecontroller::class, 'index'])->name('case');
Route::get('/case/form/{id}', [\App\Http\Controllers\casecontroller::class, 'create'])->name('case-from');
Route::post('/case/form', [\App\Http\Controllers\casecontroller::class, 'store'])->name('case-store');
Route::get('/suspect_list/{id}',[suspectController::class,'index'])->name('suspect_list');
Route::get('/finger_print_add/{id}',[suspectController::class, 'finger_print_add'])->name('finger_print_add');



// url suspect
Route::get('/suspect/form/{id}', [suspectController::class, 'create'])->name('suspect_form');
Route::post('/suspect/form', [suspectController::class, 'store'])->name('suspect_form_store');
Route::post('/fingerprints_store',[suspectController::class,'store_finger_print'])->name('store_finger_print');


Route::post('/search_fingerprint', function(Request $request){
    $searchFingerprint=$request->LeftThumb;
    $users = FingerprintModel::where('right_thumb', $searchFingerprint)
    ->orWhere('right_index', $searchFingerprint)
    ->orWhere('right_middle', $searchFingerprint)
    ->orWhere('right_ring', $searchFingerprint)
    ->orWhere('right_pinky', $searchFingerprint)
    ->orWhere('left_thumb', $searchFingerprint)
    ->orWhere('left_index', $searchFingerprint)
    ->orWhere('left_middle', $searchFingerprint)
    ->orWhere('left_ring', $searchFingerprint)
    ->orWhere('left_pinky', $searchFingerprint)
    ->get();
    dd($users);
})->name('search_fingerprint');

Route::post('/fingerprint/match', [suspectController::class, 'match']);
Route::get('/tests/fingerprint_client',function(){
    return view('fingerprint_tests(abdullah_tests_on_fingerprint).client_side');
});

