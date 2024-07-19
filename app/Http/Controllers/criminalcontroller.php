<?php

namespace App\Http\Controllers;

use App\Models\criminal;
use App\Models\CriminalPicture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function Laravel\Prompts\select;

class criminalcontroller extends Controller
{
    public function index()
    {
        $data=criminal::with('picture')->get();
        return view('criminal.criminal', compact('data'));
    }
    public function more($id)
    {
//        dd($id);
        $data=DB::table('criminals')
            ->join('cases', 'cases.id','=', 'criminals.case_id')
            ->join('suspect', 'suspect.id' ,'=', 'criminals.suspect_id')
            ->join('criminal_pictures', 'criminal_pictures.criminal_id' ,'=', 'criminals.id')
            ->select('criminals.*', 'cases.case_number', 'suspect.name', 'suspect.last_name','criminal_pictures.path')
            ->where('criminals.id', '=', $id)
            ->get();

        return view('criminal.criminal_all', compact('data'));
    }
    public function add()
    {
       $data=DB::table('suspect')
       ->select('suspect.*')
       ->get();
       $case=DB::table('cases')
           ->select('cases.*')
           ->get();
        return view('criminal.crimnal-form',compact('data'), compact('case'));
    }
    public function inset(Request $request)
    {

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'lname' => 'required|string|max:255',
        //     'father_name' => 'required|string|max:255',
        //     'phone' => 'required|string|max:15',
        //     'email' => 'required|email|max:255',
        //     'current_address' => 'required|string|max:255',
        //     'actual_address' => 'required|string|max:255',
        //     'dateofbirth' => 'required|date',
        //     'gender' => 'required|in:1,0',
        //     'job' => 'required|string|max:255',
        //     'marital_status' => 'required|in:مجرد,متاهل',
        //     'familymember' => 'required|string|max:255',
        //     'discription' => 'required|string',
        //     'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
//        dd($request->all());
        $save= new criminal();


        $save->suspect_id= $request->suspect;
        $save->case_id= $request->case;
        $save->name= $request->name;
        $save->last_name= $request->lname;
        $save->father_name= $request->father_name;
        $save->phone= $request->phone;
        $save->email= $request->email;
        $save->current_address= $request->current_address;
        $save->actual_address= $request->address;
        $save->arrest_date = Carbon::parse($request->arrest_date)->format('Y-m-d H:i:s');
        $save->date_of_birth = Carbon::parse($request->dateofbirth)->format('Y-m-d H:i:s');
        $save->gender= $request->gender;
        $save->job= $request->job;
        $save->marital_status= $request->discription;
        $save->family_members= $request->familymember;
        $save->save();


        if (!empty($request->photo)) {
            $exe = $request->file('photo')->getClientOriginalExtension();
//            dd($exe);
            $file = $request->file('photo');
            $rename = str::random(20);
            $filename = $rename . '.' . $exe;
            $file->move('criminal/', $filename);
            $criminal_picture = new CriminalPicture();
            $criminal_picture->criminal_id=$save->id;
            $criminal_picture->path=$filename;
            $criminal_picture->save();
        }
        return redirect()->route('crimnal')->with('success', 'Criminal record created successfully.');
    }
    public function edit($id)
    {
//        dd($id);
        $data=DB::table('suspect')
            ->select('suspect.*')
//            ->where('suspect.id', '=', $id)
            ->get();
        $case=DB::table('cases')
            ->select('cases.*')
//            ->where('cases.id', '=', $id)
            ->get();
        $criminal=DB::table('criminals')
            ->join('suspect', 'suspect.id', '=', 'criminals.suspect_id')
            ->join('cases','cases.id','=', 'criminals.case_id')
            ->select('criminals.*', 'suspect.name', 'cases.case_number')
            ->where('criminals.id','=', $id)
        ->get();
        return view('criminal.edit', compact('case','data','criminal'));
    }
    public function update(Request $request , string $id)
    {
//        dd($request->all());
                // Validate the incoming request data
                $request->validate([
//                    'criminal_name' => 'required',
//                    'last_name' => 'required|string|max:255',
//                    'father_name' => 'required|string|max:255',
//                    'email' => 'required|email|unique:users,email,' . $id,
//                    'phone' => 'required|string|max:255',
//                    'arrest_date' => 'required',
//                    'actual_address' => 'required|string|max:255',
//                    'current_address' => 'required|string|max:255',
//                    'date_of_birth' => 'required|date',
//                    'gender' => 'required|string',
//                    'job' => 'required|string|max:255',
//                    'marital_status' => 'required|string',
//                    'family_members' => 'required|integer|min:1',
                    // Add other fields as necessary
                ]);

                // Find the user by ID
                $criminal = criminal::findOrFail($id);
        if (!empty($request->photo)) {
            $exe = $request->file('photo')->getClientOriginalExtension();
//            dd($exe);
            $file = $request->file('photo');
            $rename = str::random(20);
            $filename = $rename . '.' . $exe;
            $file->move('criminal/', $filename);
            $criminal->photo = $filename;
        }
                // Update the user's data suspect
                $criminal->suspect_id = $request->input('suspect');
                $criminal->case_id = $request->input('case');
                $criminal->criminal_name = $request->input('name');
                $criminal->last_name = $request->input('lname');
                $criminal->father_name = $request->input('father_name');
                $criminal->email = $request->input('email');
                $criminal->phone = $request->input('phone');
                $criminal->arrest_date = $request->input('arrest_date');
                $criminal->actual_address = $request->input('address');
                $criminal->current_address = $request->input('current_address');
                $criminal->date_of_birth = $request->input('dateofbirth');
                $criminal->gender = $request->input('gender');
                $criminal->job = $request->input('job');
                if (!empty($request->discription)){
                $criminal->marital_status = $request->input('discription');
                }
                $criminal->family_members = $request->input('familymember');


        // Update other fields as necessary
                $criminal->save();

                // Redirect or return a response
                return redirect(url('/criminal/all/'.$id))->with('success', 'User updated successfully');
            }
            public function destroy($id)
            {
//                dd($id);
                // Find the resource by ID
                $resource = criminal::findOrFail($id);

                // Delete the resource
                $resource->delete();

                // Redirect or return a response
                return redirect()->route('crimnal')->with('success', 'ریکارد په موافقیت دیلبت شود !');
            }
}
