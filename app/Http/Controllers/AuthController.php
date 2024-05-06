<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\carbon;
use Illuminate\Support\Facades\Storage;
class AuthController extends Controller
{


    public function login_page(){
        if(Auth::user()){
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




    public function login(Request $request){
        // $users = User::all();

        // foreach ($users as $user) {
        //     $user->password = Hash::make($user->password);
        //     $user->save();
        // }

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            if(Auth::user()->picture==null){
            return view('profile.profile-suggestion');
            }
            return redirect()->intended('/');

        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }





    public function register(Request $request){
        $validate = $request->validate([
            'name'=>'required|min:3|max:35',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6',
        ]);

        $user = new User;
        $user->name=$validate['name'];
        $user->email=$validate['email'];
        $user->password=Hash::make($validate['password']);
        $user->save();
        return redirect()->route('login');
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

        return redirect()->route('login')->with('success', 'You have been logged out.'); // Redirect to login page with success message
    }




    public function complete_profile(Request $request){

        $dob=Carbon::createFromFormat('Y-m-d',$request->dob);
        $currenDate=Carbon::now();
        if($dob->diffInYears($currenDate)){
            return redirect()->back()->with(['age_error',"You are Below the Minumum Age Requirements"]);
        }

        $validate = $request->validate([
            'country'=>'required',
            'dob'=>'required|date',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image=$request->file('profile_image');
        $user_id=Auth::id();
        $user=User::find($user_id)->first();
        $image_name=$image->hashName();
        $user->picture=$image_name;
        $user->dob = $validate['dob'];
        $user->country=$validate['country'];

        if($user->save()){
            $image->storeAs('public/profiles',$image_name);
        }else{
            return redirect()->back()->with(['error',"An Error Occurred, Please Try Again or Contact your admin"]);
        }
        return redirect('/');
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
            $user->picture=$image_name;
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
            'dob'=>'date|required',
        ]);
        $user=User::find(Auth::user()->id)->first();
        $user->name=$validate['name'];
        $user->email=$validate['email'];
        $user->dob=carbon::parse($validate['dob'])->format('Y-m-d');
        $user->save();
        return redirect()->back()->with('success','Profile Information Has Been Updated');
    }
}
