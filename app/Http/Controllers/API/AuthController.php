<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import Hash facade for password hashing
use App\Models\Task;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Retrieve the user by email
        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            // Invalid credentials
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password'
            ], 401);
        }

        // Authentication successful, generate token

        return response()->json([
            'access_token'=>$user->createToken('api_token')->plainTextToken,
            'token_type'=>'Bearer',
        ]);
    }


    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'required|max:40',
            'password' => 'required|min:8' // Add minimum length requirement for password
        ]);

        try {
            $user = new User;
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->password = Hash::make($validated['password']); // Corrected password hashing
            $user->save();

            return response()->json([
                'success' => true,
                'user' => $user
            ]);
        } catch (\Exception $e) {
            // Handle exception (e.g., log error, return error response)
            return response()->json([
                'success' => false,
                'message' => 'User registration failed. Please try again.'
            ], 500); // Use appropriate HTTP status code (e.g., 500 for internal server error)
        }
    }

    public function read(){
        // $data=Task::first(); 
      return response()->json([
        'data' => 'hi',

      ]);
    }
}
