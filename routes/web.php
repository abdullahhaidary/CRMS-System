<?php

use App\Http\Controllers\suspectController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\SetLocale;
use App\Models\provinceaccount;
use App\Models\suspectmodel;
//use Illuminate\Support\Carbon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\criminalcontroller;
use App\Models\casemodel;
use App\Models\criminal;
use App\Models\FingerprintModel;
use App\Models\People;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;


Route::middleware(['auth'])->get('/',function(){

    $today = Carbon::today();
    $lastMonth = Carbon::now()->subMonth();
    $lastMonthNumber = $lastMonth->month;
    $lastMonthYear = $lastMonth->year;

    $total_crime_record = People::all()->count();
    $total_criminal_record = criminal::all()->count();
    $total_cases_record = casemodel::all()->count();
    $three_criminals = Criminal::with('case')->orderBy('created_at', 'desc')->take(3)->get();
    $total_provinces = Province::all();

//    $user_id=provinceaccount::where();
//    $complaintsToday = people::whereDate('created_at', $today)->count();
    $complaintsToday=DB::table('people')
//        ->join('province_account', 'province_account.user_id','=','people.user_id')
   ->where('people.user_id','=',)
        ->whereDate('created_at', $today)->count();
//    dd($complaintsToday);

    $complaintsLastMonth = people::whereMonth('created_at', $lastMonthNumber)
        ->whereYear('created_at', $lastMonthYear)
        ->count();
    $casesToday = casemodel::whereDate('created_at', $today)->count();
    $casesLastMonth = CaseModel::whereMonth('created_at', $lastMonthNumber)
        ->whereYear('created_at', $lastMonthYear)
        ->count();

    return view('layout.home',compact('total_crime_record','total_criminal_record',
        'total_cases_record','three_criminals','total_provinces', 'complaintsToday','complaintsLastMonth',
        'casesToday', 'casesLastMonth' ));
})->name('home');


Route::get('language/{local}', function ($local) {
    app()->setLocale($local);
    session()->put('locale', $local);
    App::setLocale($local);
    session()->save();
    return redirect()->back();
})->withoutMiddleware([SetLocale::class]);



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

//Route::group(['middleware'=>'can:super_admin','auth'],function (){

//    Route::middleware([isAdmin::class])->get('crimnal-list',[\App\Http\Controllers\adminconroller::class, 'index'])->name('crimnal');
//});

// Route::group(['middleware'=>'can:super_admin', 'can:admin','auth'],function (){


//Route::prefix('admin')->group(function () {

//crimnal url
    Route::get('/crimnal-list', [\App\Http\Controllers\criminalcontroller::class, 'index'])->name('crimnal');
    Route::get('/criminal/all/{id}', [\App\Http\Controllers\criminalcontroller::class, 'more'])->name('criminal_all');
    Route::get('/criminalcontroller-from', [\App\Http\Controllers\criminalcontroller::class, 'add'])->name('criminalcontroller-form');
    Route::post('/crminal-from', [\App\Http\Controllers\criminalcontroller::class, 'inset'])->name('criminal-from');
    Route::get('criminal/edit/{id}', [\App\Http\Controllers\criminalcontroller::class, 'edit'])->name('criminal_edit');
    Route::post('criminal/edit/{id}', [\App\Http\Controllers\criminalcontroller::class, 'update'])->name('criminal_update');
    Route::get('criminal/delete/{id}', [\App\Http\Controllers\criminalcontroller::class, 'destroy'])->name('criminal-delete');
    Route::get('criminal/picture/{id}', [\App\Http\Controllers\criminalcontroller::class, 'picture'])->name('criminal_picture');
    Route::post('criminal/picture/{id}', [\App\Http\Controllers\criminalcontroller::class,'picture_save'])->name('picture_save');
 Route::get('criminal/picture/show/{id}', [\App\Http\Controllers\criminalcontroller::class, 'show_picture'])->name('show_picture');
 Route::post('/fingerprints_store_criminal',[criminalcontroller::class,'store_finger_print'])->name('store_finger_print_criminal');
Route::get('/criminal/addfinger/{id}', [criminalcontroller::class,'finger_print_add'])->name('criminal_finger_add_page');


    //url user
Route::get('/admin', [\App\Http\Controllers\admincontrol::class, 'index'])->name('user')->middleware('auth');
Route::get('/admin/edit/{id}', [\App\Http\Controllers\admincontrol::class, 'edit'])->name('user_edit')->middleware('auth');
Route::post('admin/update/{id}', [\App\Http\Controllers\admincontrol::class, 'update'])->name('user_update')->middleware('auth');

//url people
Route::get('people/list', [\App\Http\Controllers\pepolecontroller::class, 'people_list'])->name('list_people');
Route::get('/people', [\App\Http\Controllers\pepolecontroller::class, 'index'])->name('people');
Route::get('/people_from', [\App\Http\Controllers\pepolecontroller::class, 'create'])->name('people_form');
Route::post('/people_from', [\App\Http\Controllers\pepolecontroller::class, 'store'])->name('people-store');
Route::get('/ariza/arizafile/{id}', [\App\Http\Controllers\pepolecontroller::class, 'ariza'])->name('artiza_file');
Route::get('people/edit/{id}', [\App\Http\Controllers\pepolecontroller::class, 'edit'])->name('people_edit');
Route::post('people/update/{id}', [\App\Http\Controllers\pepolecontroller::class, 'update'])->name('people_update');
Route::get('people/delete/{id}', [\App\Http\Controllers\pepolecontroller::class, 'destroy'])->name('people-delete');
Route::get('/people/all/{id}', [\App\Http\Controllers\pepolecontroller::class, 'moreShow'])->name('people_all');
Route::get('/generate-pdf/{id}', [\App\Http\Controllers\pepolecontroller::class, 'generatePDF'])->name('pdf');

//url province people
Route::get('/province/people', [\App\Http\Controllers\provinceComplintcontroller::class, 'index'])->name('province_list');
Route::get('/province/people/form', [\App\Http\Controllers\provinceComplintcontroller::class, 'create'])->name('province_from');
Route::post('/province/people/form', [\App\Http\Controllers\provinceComplintcontroller::class, 'store'])->name('province_store');
Route::get('/province/people/edit/{id}', [\App\Http\Controllers\provinceComplintcontroller::class, 'edit'])->name('province_edit');
Route::post('/province/people/update/{id}', [\App\Http\Controllers\provinceComplintcontroller::class, 'update'])->name('province_people_update');
Route::get('/province/people/delete/{id}', [\App\Http\Controllers\provinceComplintcontroller::class, 'destroy'])->name('province_people_delete');


// url suspect
    Route::get('/suspect_list/{id}',[suspectController::class,'index'])->name('suspect_list');
    Route::get('suspect/list', [suspectController::class, 'all_list'])->name('all_list');
    Route::get('/suspect/form/{id}', [suspectController::class, 'create'])->name('suspect_form');
    Route::post('/suspect/form/save/{id}', [suspectController::class, 'store'])->name('suspect_form_store');
    Route::get('/suspect/edit/{id}', [suspectController::class, 'edit'])->name('suspect_edit');
    Route::post('/suspect/update/{id}', [suspectController::class, 'update'])->name('suspect_update');
    Route::get('/suspect/delete/{id}', [suspectController::class, 'destroy'])->name('suspect_delete');
    Route::post('/fingerprints_store',[suspectController::class,'store_finger_print'])->name('store_finger_print');
    Route::get('/un_suspect/list/{id}', [suspectController::class, 'Remove_from_suspect'])->name('Un_suspect_list');

// end of middleware

//});

// });


//url province crime record information
Route::get('province/crime/info/{id}', [\App\Http\Controllers\province_crime_info_controller::class, 'index'])->name('province_crime_info');
Route::get('province/crime/info/edit/{id}', [\App\Http\Controllers\province_crime_info_controller::class, 'edit'])->name('province_info_edit');
Route::post('province/crime/info/update/{id}', [\App\Http\Controllers\province_crime_info_controller::class, 'update'])->name('province_info_update');
Route::get('province/crime/info/delete/{id}', [\App\Http\Controllers\province_crime_info_controller::class, 'destroy'])->name('province_info_delete');


//url crime record information
Route::get('crime/info/{id}', [\App\Http\Controllers\crime_register_record_information::class, 'index'])->name('crime_info');
Route::get('crime/info/edit/{id}', [\App\Http\Controllers\crime_register_record_information::class, 'edit'])->name('info_edit');
Route::post('crime/info/update/{id}', [\App\Http\Controllers\crime_register_record_information::class, 'update'])->name('info_update');
Route::get('crime/info/delete/{id}', [\App\Http\Controllers\crime_register_record_information::class, 'destroy'])->name('info_delete');



//url department
//Route::group(['middleware'=>'isAmin'], function (){
Route::get('/department', [\App\Http\Controllers\departmentContoller::class, 'index'])->name('department');
Route::get('/department form', [\App\Http\Controllers\departmentContoller::class, 'create'])->name('department_form');
Route::post('/department form', [\App\Http\Controllers\departmentContoller::class, 'store'])->name('department_form');

//ulr cases
Route::get('/case/{id}', [\App\Http\Controllers\casecontroller::class, 'index'])->name('case');
Route::get('case/all/list', [\App\Http\Controllers\casecontroller::class, 'list'])->name('list_cases');
Route::get('/case/form/{id}', [\App\Http\Controllers\casecontroller::class, 'create'])->name('case-from');
Route::post('/case/form', [\App\Http\Controllers\casecontroller::class, 'store'])->name('case-store');
Route::get('/finger_print_add/{id}',[suspectController::class, 'finger_print_add'])->name('finger_print_add');

//url province cases
Route::get('/province/case/{id}', [\App\Http\Controllers\province_case_controller::class, 'index'])->name('case');
Route::get('province/case/form/{id}', [\App\Http\Controllers\province_case_controller::class, 'create'])->name('case-from');
Route::post('/province/case/form', [\App\Http\Controllers\province_case_controller::class, 'store'])->name('case_store');


// url province account
Route::get('/province/account', [\App\Http\Controllers\provincecontroller::class, 'create'])->name('province_account');
Route::post('/province/add', [\App\Http\Controllers\provincecontroller::class, 'store'])->name('province_register');
Route::get('/province/list', [\App\Http\Controllers\provincecontroller::class, 'index'])->name('province_liat');




//url province suspect
Route::get('province/suspect_list/{id}',[\App\Http\Controllers\province_suspect_controller::class,'index'])->name('suspect_list');
Route::get('province/suspect/form/{id}', [\App\Http\Controllers\province_suspect_controller::class, 'create'])->name('suspect_form');
Route::post('province/suspect/form/save/{id}', [\App\Http\Controllers\province_suspect_controller::class, 'store'])->name('suspect_form_store');
Route::get('province/suspect/edit/{id}', [\App\Http\Controllers\province_suspect_controller::class, 'edit'])->name('suspect_edit');
Route::post('/province/suspect/update/{id}', [\App\Http\Controllers\province_suspect_controller::class, 'update'])->name('suspect_update');
Route::get('province/suspect/delete/{id}', [\App\Http\Controllers\province_suspect_controller::class, 'destroy'])->name('suspect_delete');


//url province criminal
Route::get('province/criminal', [\App\Http\Controllers\provice_criminal::class, 'index'])->name('province_criminal');
//url evidence

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
})->middleware('can:admin');

Route::get('/fetchFingerprint',function(){
    $fingerprint = FingerprintModel::get();
    return response()->json(['fingerprint' => $fingerprint]);
})->name('fetchFingerprint');

Route::get('/find_person_from_fingerprint', function (Request $request) {
    $fingerprintId = $request->query('id');

    $person = suspectmodel::where('id', $fingerprintId)->first();
    return response()->json(['person' => $person]);
})->name('findPersonFromFingerprint');

Route::fallback(function(){
    return view('errors.403');
});


Route::get('/criminal-livewire',function(){
    return view('criminal_livewire');
});
