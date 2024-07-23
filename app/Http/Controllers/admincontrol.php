<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class admincontrol extends Controller
{
    public function index()
    {

        $data=User::paginate(5);
//        $data=DB::table('users')
//            ->join('province_account','province_account.user_id', '=', 'users.id')
//            ->select('users.*', 'province_account.province')
//            ->get();
        return view('admin.user', compact('data'));
    }

    public function show(string $id)
    {
        //
    }

        public function edit(string $id)
    {

            $data=User::where('users.id', '=', $id)->paginate(5);
        return view('admin/user_edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
//        dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
            // Add more validation rules as needed
        ]);

        // Find the resource by ID
        $resource = user::findOrFail($id);


//        if ($request->hasFile('picture')) {
//            $image = $request->file('picture');
//            $image_name = $image->hashName(); // Generate a unique name for the image
           // $user->picture = $image_name; // Update the user's profile picture attribute
//dd($image_name);
            // Store the image in the 'public/profiles' directory
//            $image->storeAs('public/profiles', $image_name);
//        }
//        if (!empty($request->picture)) {
//            $exe = $request->file('picture')->getClientOriginalExtension();
////            dd($exe);
//            $file = $request->file('picture');
//            $rename = str::random(20);
//            $filename = $rename . '.' . $exe;
//            $file->storeAs('public/profiles', $filename);
//        }
//        dd($request->action);
        // Update the resource with validated data
        $resource->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'type' => $request->type,
            'action' => $request->action,
//            'picture'=>$filename,

            // Add more fields as needed
        ]);

        // Optionally, you can return a response indicating success
        return redirect()->route('user')
            ->with('success', 'Resource updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function uperadmin()
    {

    }
}
