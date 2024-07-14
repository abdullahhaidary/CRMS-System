<?php

namespace App\Http\Controllers;

use App\Models\criminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function Laravel\Prompts\select;

class criminalcontroller extends Controller
{
    public function index()
    {
        $data=DB::table('criminals')
            ->select('criminals.*')
            ->get();
        return view('criminal.criminal', compact('data'));
    }
    public function more($id)
    {
//        dd($id);
        $data=DB::table('criminals')
            ->join('cases', 'cases.id','=', 'criminals.case_id')
            ->join('suspect', 'suspect.id' ,'=', 'criminals.suspect_id')
            ->select('criminals.*', 'cases.case_number', 'suspect.name', 'suspect.last_name')
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

        if (!empty($request->photo)) {
            $exe = $request->file('photo')->getClientOriginalExtension();
//            dd($exe);
            $file = $request->file('photo');
            $rename = str::random(20);
            $filename = $rename . '.' . $exe;
            $file->move('criminal/', $filename);
            $save->photo = $filename;
        }

        $save->suspect_id= $request->suspect;
        $save->case_id= $request->case;
        $save->criminal_name= $request->name;
        $save->last_name= $request->lname;
        $save->father_name= $request->father_name;
        $save->phone= $request->phone;
        $save->email= $request->email;
        $save->current_address= $request->current_address;
        $save->actual_address= $request->address;
        $save->arrest_date= $request->arrest_date;
        $save->date_of_birth= $request->dateofbirth;
        $save->gender= $request->gender;
        $save->job= $request->job;
        $save->marital_status= $request->discription;
        $save->family_members= $request->familymember;
        $save->save();

        return redirect()->route('crimnal')->with('success', 'Criminal record created successfully.');
    }
    public function edit($id)
    {
//        dd($id);
        $data=DB::table('suspect')
            ->select('suspect.*')
//            ->where('id', '=', $id)
            ->get();
        $case=DB::table('cases')
            ->select('cases.*')
            ->where('cases.id', '=', $id)
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
        
        dd($request->all());
    }
}
