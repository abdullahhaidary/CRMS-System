<?php

namespace App\Http\Controllers;

use App\Models\casemodel;
use App\Models\people;
use App\Models\crime_register_record_information;
use App\Models\suspectmodel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
/**
 * this is for test
 */
/** */
class pepolecontroller extends Controller
{
    public function index()
    {
        return view('people.people');
    }
    public function people_list()
    {
        $data = people::orderby('id', 'desc')->paginate('5');
        return view('people.people_list', compact('data'));
    }
    public function create()
    {
        return view('people.people_form');
    }
    public function store(Request $request)
    {
        // Define validation rules
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'tazcira_number' => 'required|string|max:15',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'curent_address' => 'required|string|max:255',
            'creime_subject' => 'required|string|max:255',
            'crime_case' => 'required|string|max:255',
            'crime_date' => 'required|date',
            'ariza_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ], [
            'name.required' => 'Please enter your name.',
            'lname.required' => 'Please enter your Last name.',
            'phone.numeric' => 'The phone number must be a number.',
            'email.email' => 'please enter email.',
            'address.required' => 'please enter address.',
            'curent_address.required' => 'please enter address.',
            'crime_case.required' => 'please enter crime case.',
            'tazcira_number.required' => 'please enter tazcera number.',
            'ariza_file.mimes' => 'The file must be a PDF, DOC, or DOCX.',
            'ariza_file.required' => 'The file must be a PDF, DOC, or DOCX.',
            'ariza_file.max' => 'The file size must not exceed 2MB.',
            'creime_subject.required' => 'please enter crime subject.',
            'crime_date.required' => 'please enter crime date.',

        ]);

        // Create a new instance of the model
        $save = new People(); // Ensure this matches your model

        // Handle file upload if present
        if ($request->hasFile('ariza_file')) {
            $file = $request->file('ariza_file');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('ariza-of-compleint'), $filename);
            $save->ariza = $filename;
        }

        // Assign validated data to the model
        $save->name = $validatedData['name'];
        $save->last_name = $validatedData['lname'];
        $save->father_name = $validatedData['fname'];
        $save->email = $validatedData['email'];
        $save->phone = $validatedData['phone'];
        $save->actual_address = $validatedData['address'];
        $save->current_address = $validatedData['curent_address'];
        $save->crime_case = $validatedData['crime_case'];
        $save->tazkira_number = $validatedData['tazcira_number'];
        $save->subject_crim = $validatedData['creime_subject'];
        $save->crim_date = $validatedData['crime_date'];
        $save->user_id = Auth::user()->id;
        $save->Created_by = Auth::user()->name;

        // Save the model to the database
        $save->save();

        $savedPeople = People::where('name', $save->name)
            ->where('phone', $save->phone)
            ->first();
        //        dd($savedPeople);
        $messages = [
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 255 characters.', // Adjust the max length if needed
        ];

        $validatedData = $request->validate([
            'description' => 'required|string|max:255', // Adjust max length according to your needs
        ], $messages);

        $description = new crime_register_record_information();
        $description->people_id = $savedPeople->id;
        $description->description = $validatedData['description']; // Use validated data
        $description->save();

        // Define custom validation messages
        $messages = [
            'suspect_name.string' => 'The suspect name must be a string.',
            'suspect_name.max' => 'The suspect name may not be greater than 255 characters.',

            'father_name.string' => 'The father\'s name must be a string.',
            'father_name.max' => 'The father\'s name may not be greater than 255 characters.',

            'last_name.string' => 'The last name must be a string.',
            'last_name.max' => 'The last name may not be greater than 255 characters.',

            'phone_number.numeric' => 'The phone number must be a number.',
            'phone_number.max' => 'The phone number may not be greater than 15 characters.',

            'main_address.string' => 'The main address must be a string.',
            'main_address.max' => 'The main address may not be greater than 255 characters.',

            'current_address.string' => 'The current address must be a string.',
            'current_address.max' => 'The current address may not be greater than 255 characters.',

            'tazkera_number.numeric' => 'The Tazkera number must be a number.',
            'tazkera_number.max' => 'The Tazkera number may not be greater than 20 characters.',
        ];
        // Validate the request data
        $validatedData = $request->validate([
            'suspect_name' => 'nullable|string',
            'father_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'phone_number' => 'nullable|numeric',
            'main_address' => 'nullable|string',
            'current_address' => 'nullable|string',
            'tazkera_number' => 'nullable|numeric',
        ], $messages);
// Save the validated data to the suspectmodel table
        $suspect = new suspectmodel();
        $savedesc = crime_register_record_information::where('people_id', $savedPeople->id)
            ->where('description', $description->description)->first();
        $suspect->crime_record_id = $savedesc->id;
        $suspect->name = $validatedData['suspect_name']; // Use validated data
        $suspect->father_name = $validatedData['father_name'];
        $suspect->last_name = $validatedData['last_name'];
        $suspect->phone = $validatedData['phone_number'];
        $suspect->actual_address = $validatedData['main_address'];
        $suspect->current_address = $validatedData['current_address'];
        $suspect->tazcira_number = $validatedData['tazkera_number'];
        $suspect->isCriminal = 0;
        $suspect->Created_by = Auth::user()->id;
        $suspect->save();

        return redirect(route('people'))->with('success', 'د شکایت کونکی معلومات ذخیره شول اوس معلومات اضافی داخل کړی');

        //        dd($request->all());
    }
    public function ariza($id)
    {
        $ariza = people::where('people.id', '=', $id)->get();
        return view('files.people_ariza', compact('ariza'));
    }
    public function edit($id)
    {
        $data = DB::table('people')->select('people.*')
            ->where('people.id', '=', $id)->get();
        return view('people.edit', compact('data'));
    }
    public function update(Request $request, string $id)
    {
        //        dd($request->all());
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
            $file = $request->file('ariza_file');
            $rename = str::random(20);
            $filename = $rename . '.' . $exe;
            $file->move('ariza_of_compleint/', $filename);
            $criminal->ariza = $filename;
        }
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

        $criminal->save();

        // Redirect or return a response
        return redirect(url('/people'))->with('success', 'User updated successfully');
    }
    public function destroy($id)
    {
        //        dd($id);
        // Find the resource by ID
        $resource = people::findOrFail($id);
        // Delete the resource
        $resource->delete();

        // Redirect or return a response
        return redirect()->back()->with('success', 'ریکارد به موافقیت حذف شود.');
    }
    public function moreShow($id)
    {
        $peoples = people::where('id', '=', $id)->get();
        $info = crime_register_record_information::where('people_id', '=', $id)->get();
        $suspects = suspectmodel::where('crime_record_id', '=', $id)->where('isCriminal', '=', 1)->get();
        $cases = casemodel::where('crime_record_id', '=', $id)->get();

        //        $data = compact('peoples', 'suspects', 'cases', 'info');
        //
        //$pdf = PDF::loadView('people.all_about_people', $data);
        //
        //return $pdf->download('complaint-details.pdf');
        //
        return view('people.all_about_people', compact('peoples', 'info', 'suspects', 'cases'));
    }
    public function generatePDF(Request $request, $id)
    {
        $peoples = people::where('id', '=', $id)->get();
        $info = crime_register_record_information::where('people_id', '=', $id)->get();
        $suspects = suspectmodel::where('crime_record_id', '=', $id)->get();
        $cases = casemodel::where('crime_record_id', '=', $id)->get();
//dd($cases);
        $data = [
            'title' => 'People case',
            'peoples' => $peoples,
            'suspects' => $suspects,
            'cases' => $cases,
            'info' => $info,
        ];

        $pdf = PDF::loadView('people.all_about_people', $data);
        $pdf->setOptions([
            'defaultFont' => 'NotoNaskhArabic',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);

        return $pdf->download('report.pdf');
    }
}
