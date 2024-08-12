<?php

namespace App\Http\Controllers;

use App\Models\casemodel;
use Illuminate\Http\Request;
use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class casecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        $data=casemodel::where('crime_record_id', '=', $id)->paginate(6);
        return view('cases.case', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

        return view('cases.case-from',compact('id'));
    }
    public function case()
    {

        return view('cases.mian_case');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define custom validation messages
        $messages = [
            'crime_record_id.required' => 'The crime record ID field is required.',
            'crime_record_id.integer' => 'The crime record ID must be an integer.',

            'case_number.required' => 'The case number field is required.',
            'case_number.string' => 'The case number must be a string.',
            'case_number.max' => 'The case number may not be greater than 255 characters.',

            'start_date.required' => 'The start date field is required.',
            'start_date.date' => 'The start date must be a valid date.',

            'end_date.date' => 'The end date must be a valid date.',

            'case_status.required' => 'The case status field is required.',
            'case_status.string' => 'The case status must be a string.',
            'case_status.in' => 'The case status must be either open, closed, or pending.', // Adjust according to your options

            'crime_type.required' => 'The crime type field is required.',
            'crime_type.string' => 'The crime type must be a string.',
            'crime_type.max' => 'The crime type may not be greater than 255 characters.',

            'crime_location.required' => 'The crime location field is required.',
            'crime_location.string' => 'The crime location must be a string.',
            'crime_location.max' => 'The crime location may not be greater than 255 characters.',

            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
        ];

// Validate the request data
        $validatedData = $request->validate([
            'crime_record_id' => 'required|integer',
            'case_number' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable',
            'case_status' => 'required|string', // Adjust according to your options
            'crime_type' => 'required|string|max:255',
            'crime_location' => 'required|string|max:255',
            'description' => 'required|string',
        ], $messages);

// Save the validated data to the casemodel table
        $save = new casemodel();
        $save->crime_record_id = $validatedData['crime_record_id'];
        $save->case_number = $validatedData['case_number'];
        $save->start_date = $validatedData['start_date'];
        $save->end_date = $validatedData['end_date'];
        $save->status = $validatedData['case_status'];
        $save->crime_type = $validatedData['crime_type'];
        $save->crime_location = $validatedData['crime_location'];
        $save->description = $validatedData['description'];
        $save->save();

        $id = $validatedData['crime_record_id']; // Use validated data



        $id=$request->crime_record_id;
//        return redirect()->url('case/'. $id);
        return redirect(url('case/'.$id))->with('success',"کیس په موفقیت سره ذخیره شو!");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//
    }

    public function edit(string $id)
    {
        $case=DB::table('cases')
            ->select('cases.*')
            ->where('id', '=',$id)
            ->get();

        return view('cases.edit', compact('case'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //        dd($id);
        // Find the resource by ID
        $resource = casemodel::findOrFail($id);
        // Delete the resource
        $resource->delete();

        // Redirect or return a response
        return redirect()->back()->with('success', 'ریکارد به موافقیت حذف شود.');
    }
    public function list()
    {
        $data=casemodel::orderby('id', 'desc')->paginate('8');
        return view('cases.all', compact('data'));
    }

}
