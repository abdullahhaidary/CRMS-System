<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Province;
use App\Models\suspectmodel;
use App\Models\crime_register_record_information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class provinceComplintcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=people::where('user_id','=',Auth::user()->id)
            ->paginate(5);

        return view('province.people.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('province.people.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save= new people();

        if (!empty($request->ariza_file)) {
            $exe = $request->file('ariza_file')->getClientOriginalExtension();
//            dd($exe);
            $file = $request->file('ariza_file');
            $rename = str::random(20);
            $filename = $rename . '.' . $exe;
            $file->move('ariza-of-compleint/', $filename);
            $save->	ariza = $filename;
        }
//dd($request->address);
//        $save->id=4;
        $save->name=$request->name;
        $save->last_name=$request->lname;
        $save->father_name=$request->fname;
        $save->email=$request->email;
        $save->phone=$request->phone;
        $save->actual_address=$request->address;
        $save->current_address=$request->curent_address;
        $save->crime_case=$request->crime_case;
//        $save->ariza_file=$request->name;
        $save->tazkira_number=$request->tazcira_number;
        $save->	subject_crim=$request->creime_subject;
        $save->	crim_date=$request->crime_date;
        $save->user_id=Auth::user()->id;


//dd($savedPeople->id);
        $save->save();


        $savedPeople = People::where('name', $save->name)->where('phone', $save->phone)->first();
//        dd($savedPeople);

        $description = new crime_register_record_information();
        $description->people_id = $savedPeople->id;
        $description->description = $request->description;
        $description->save();

//        if(false){
        $suspect= new suspectmodel();
        $savedesc = crime_register_record_information::where('people_id', $savedPeople->id)->where('description', $description->description)->first();
        $suspect->crime_record_id=$savedesc->id;
        $suspect->name=$request->suspect_name;
        $suspect->last_name=$request->last_name;
        $suspect->phone=$request->phone_number;
        $suspect->actual_address=$request->main_address;
        $suspect->current_address=$request->current_address;
        $suspect->tazcira_number=$request->tazkera_number;
        $suspect->save();
//        }
        return redirect(route('province_list'))->with('success',"د شکایت کونکی معلومات ذخیره شول اوس معلومات اضافی داخل کړی");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=DB::table('people')
            ->select('people.*')
            ->where('people.id','=',$id)
            ->get();
        return view('province.people.edit',compact('data'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
//                    'name' => 'required',
//                    'last_name' => 'required|string|max:255',
//                    'father_name' => 'required|string|max:255',
//                    'email' => 'required|email|unique:users,email,' . $id,
//                    'phone' => 'required|string|max:255',
//                    'actual_address' => 'required|string|max:255',
//                    'current_address' => 'required|string|max:255',
//                    'crime_case' => 'required|string',
//                    'subject_crim' => 'required|string|max:255',
//                    'crim_date' => 'required|string',
            // Add other fields as necessary
        ]);

        // Find the user by ID
        $criminal = people::findOrFail($id);
        if (!empty($request->ariza_file)) {
            $exe = $request->file('ariza_file')->getClientOriginalExtension();
//            dd($exe);
            $file = $request->file('ariza_file');
            $rename = str::random(20);
            $filename = $rename . '.' . $exe;
            $file->move('ariza_of_compleint/', $filename);
            $criminal->ariza = $filename;
        }
        // Update the user's data suspect
        $criminal->name = $request->input('name');
        $criminal->last_name = $request->input('lname');
        $criminal->father_name = $request->input('fname');
        $criminal->email = $request->input('email');
        $criminal->phone = $request->input('phone');
        $criminal->tazkira_number = $request->input('tazcira_number');
        $criminal->actual_address = $request->input('address');
        $criminal->current_address = $request->input('curent_address');
        $criminal->crime_case = $request->input('crime_case');
        $criminal->subject_crim = $request->input('creime_subject');
        $criminal->crim_date = $request->input('crime_date');

        // Update other fields as necessary
        $criminal->save();

        // Redirect or return a response
        return redirect(route('province_list'))->with('success', 'User updated successfully');
    }
    public function destroy(string $id)
    {
        $resource = people::findOrFail($id);

        // Delete the resource
        $resource->delete();

        // Redirect or return a response
        return redirect()->route('province_list')->with('success', 'Resource deleted successfully.');
    }
}
