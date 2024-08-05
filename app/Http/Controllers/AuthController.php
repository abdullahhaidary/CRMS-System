<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\carbon;
use Illuminate\Support\Facades\Storage;
class AuthController extends Controller
{



    public function login_page(){
//        dd(Auth::user());
        if(Auth::user() and Auth::user()->action===1){
            return redirect('/');
        }
        return view('profile.login');
    }


    public function register_page(){
        return view('profile.register');
    }


    public function forget_page(){
        return view('profile.forget');
    }




    public function login(Request $request)
    {
        // $users = User::all();

        // foreach ($users as $user) {
        //     $user->password = Hash::make($user->password);
        //     $user->save();
        // }

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:2',
        ]);
        // test message added for another commit
        if (Auth::attempt($credentials)) {
            if (Auth::user()->picture == null and Auth::user()->action==1) {
                return view('profile.profile-suggestion');
            } else {
                return redirect()->to('/');
            }

        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);

        }
    }
    public function register(Request $request){
//        dd($request->all());
        $validate = $request->validate([
            'name'=>'required|min:3|max:35',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6',


        ]);

        $user = new User;

        $user->name=$validate['name'];
        $user->email=$validate['email'];
        $user->type=$request->postion;
        $user->action=$request->action;
        $user->password=Hash::make($validate['password']);
        $user->save();
        return redirect()->route('user')->with('success', "نوی یوزر په موفقیت ذخیره شو!");
    }

     public function forget(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }
    public function forget_token(string $token){
        return view('profile.reset', ['token' => $token]);
    }






    public function forget_password(Request $request){
         $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
        ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                // event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }





   /**
     * Logout the authenticated user.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
      public function logout(Request $request)
    {
        Auth::logout(); // Logout the authenticated user

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect()->route('login')->with('success', "You have been logged out."); // Redirect to login page with success message
    }




    public function complete_profile(Request $request){


        // $dob=Carbon::createFromFormat('Y-m-d',$request->dob);
        // $currenDate=Carbon::now();

        // dd($request);
        $dob=Carbon::createFromFormat('Y-m-d',$request->dob);
        $currenDate=Carbon::now();

        // if($dob->diffInYears($currenDate)<14){
        //     return redirect()->back()->with(['age_error',"You are Below the Minumum Age Requirements"]);
        // }

        $validate = $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'old_password' => 'required',
            'new_password' => 'required|min:8', // Optionally, you can add more validation rules for the new password
            'dob' => 'required|date'
        ]);

        $user = Auth::user();

        // Check if the old password matches
        if (Hash::check($request->old_password, $user->password)) {
            if (!Hash::check($request->new_password, $user->password)) {
                // Update the password
                $user->password = Hash::make($request->new_password);

                // Handle the profile image upload if necessary
                if ($request->hasFile('profile_image')) {
                    $image = $request->file('profile_image');
                    $image_name = $image->hashName(); // Generate a unique name for the image
                    $user->picture = $image_name;     // Update the user's profile picture attribute

                    // Store the image in the 'public/profiles' directory
                    $image->storeAs('profiles', $image_name);
                }
                $user->save();
            }else{
                return back()->withErrors(['new_password' => 'The new password cannot be the same as the old password.']);
            }

            return redirect('/profile');
        } else {
            return back()->withErrors(['old_password' => 'The provided old password does not match our records.']);
        }

    }


    public function profile_change(Request $request){
        $validate= $request->validate([
            'picture'=>'required|required|mimes:png,jpg'
        ]);
        $image=$request->file('picture');
        $image_name=$image->hashName();
        $user=User::find(Auth::user()->id)->first();
        $filePath='public/profiles/'.$user->picture;
        if(Storage::exists($filePath)){
            if(Storage::delete($filePath)){
            $image->storeAs('public/profiles', $image_name);
            $user = User::updateOrCreate(['id'=> Auth::user()->id],['picture'=> $image_name]);
            $user->save();
            }
        }
        // if(unlink('public/profiles/'.$user->picture)){
            $image->storeAs('public/profiles', $image_name);
            $user->picture=$image_name;
            $user->save();

        // }else{
        //     return redirect()->back()->with(['error','An Error Occured, Please Try Again Later or contact your admin']);
        // }
        return redirect()->back();
    }

    public function profile_info_edit(Request $request){
        $validate= $request->validate([
            'name'=>'required',
            'email'=>'email|required',
        ]);
        $user=User::updateOrCreate(['id'=>Auth::user()->id],
                ['name'=>$validate['name'] , 'email'=>$validate['email'] ]);
        $user->save();
        return redirect()->back()->with('success',"پروفایل په موفقیت سره تغیر شو !");
    }
    public function profile_info()
    {
//        $user = User::getSingle(Auth::user()->id);
        $data=DB::table('users')
            ->select('users.*')
            ->where('id', '=', auth::user()->id)
            ->get();
        return view('profile.profile_detail', compact('data'));

    }
    public function update_password(Request $request){


        $validate = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8', // Optionally, you can add more validation rules for the new password
        ]);

        $user = Auth::user();

        // Check if the old password matches
        if (Hash::check($request->old_password, $user->password)) {
            if (!Hash::check($request->new_password, $user->password)) {
                // Update the password
                $user->password = Hash::make($request->new_password);

                $user->save();
            }else{
                return back()->withErrors(['new_password' => 'The new password cannot be the same as the old password.']);
            }

            return redirect('/profile');
        } else {
            return back()->withErrors(['old_password' => 'The provided old password does not match our records.']);
        }

    }
}
