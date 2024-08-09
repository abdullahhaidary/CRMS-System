<?php

namespace App\Http\Controllers;

use App\Models\casemodel;
use App\Models\criminal;
use App\Models\CriminalPicture;
use App\Models\FingerprintModel;
use App\Models\suspectmodel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function Laravel\Prompts\select;

class criminalcontroller extends Controller
{
    public function index()
    {
        $data = criminal::with(['picture','suspect'])->paginate('5');
        return view('criminal.criminal', compact('data'));
    }
    public function more($id)
    {
        //        dd($id);
        $data = DB::table('criminals')
            ->leftJoin('cases', 'cases.id', '=', 'criminals.case_id')
            ->leftJoin('suspect', 'suspect.id', '=', 'criminals.suspect_id')
            //            ->join('criminal_pictures', 'criminal_pictures.criminal_id' ,'=', 'criminals.id' )
            ->select('criminals.*', 'cases.case_number', 'suspect.name', 'suspect.last_name')
            ->where('criminals.id', '=', $id)
            ->get();

        if ($data) {
            return view('criminal.criminal_all', compact('data'));
        } else {
            return redirect()->back()->with('error', 'Not Found Data');
        }
    }
    public function add()
    {
        //       $data=DB::table('suspect')
        //       ->select('suspect.*')
        //       ->get();
        //       $case=DB::table('cases')
        //           ->select('cases.*')
        //           ->get();
        $data = suspectmodel::get();
        $case = casemodel::get();
        $crime = criminal::get();
        return view('criminal.crimnal-form', compact('data', 'case', 'crime'));
    }

    public function finger_print_add($id)
    {
        $data = DB::table('criminals')->select('criminals.*', 'suspect.*')->leftJoin('suspect', 'criminals.suspect_id', '=', 'suspect.id')->where('criminals.id', '=', $id)->get();

        return view('criminal.criminal_finger_add', compact('data'));
    }

    public function store_finger_print(Request $request)
    {
        $fingerprints = new FingerprintModel();
        $fingerprints->criminal_id = $request->id;
        $fingerprints->Leftbmpbase64image = $request->Leftbmpbase64image;
        $fingerprints->right_thumb = $request->RightThumb;
        $fingerprints->right_thumb = $request->RightThumb;
        $fingerprints->left_thumb = $request->LeftThumb;
        $fingerprints->right_index = $request->RightIndex;
        $fingerprints->left_index = $request->LeftIndex;
        $fingerprints->save();
        return redirect()->back();
    }

    public function inset(Request $request)
    {

       $validatedData=  $request->validate([
             'name' => 'required|string|max:255',
             'lname' => 'required|string|max:255',
             'father_name' => 'required|string|max:255',
             'phone' => 'required|string|max:15',
             'email' => 'required|email|max:255',
             'current_address' => 'required|string|max:255',
             'actual_address' => 'required|string|max:255',
             'dateofbirth' => 'required|date',
             'gender' => 'required|in:1,0',
             'job' => 'required|string|max:255',
             'marital_status' => 'required|in:مجرد,متاهل',
             'familymember' => 'required|string|max:255',
             'discription' => 'required|string',
             'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);

        $save = new criminal();

        if (!empty($request->photo)) {
            $exe = $request->file('photo')->getClientOriginalExtension();
            //            dd($exe);
            $file = $request->file('photo');
            $rename = str::random(20);
            $filename = $rename . '.' . $exe;
            $file->move('criminal/', $filename);
            $save->photo = $filename;
        }
        $save->suspect_id = $request->suspect;
        $save->case_id = $request->case;
        $save->criminal_name = $request->name;
        $save->last_name = $request->lname;
        $save->father_name = $request->father_name;
        $save->phone = $request->phone;
        $save->email = $request->email;
        $save->current_address = $request->current_address;
        $save->actual_address = $request->address;
        $save->arrest_date = Carbon::parse($request->arrest_date)->format('Y-m-d H:i:s');
        $save->date_of_birth = Carbon::parse($request->dateofbirth)->format('Y-m-d H:i:s');
        $save->gender = $request->gender;
        $save->job = $request->job;
        $save->marital_status = $request->discription;
        $save->family_members = $request->familymember;
        $save->suspect_id = $request->suspect;
//        $save->case_id = $request->case;
        $save->Created_by = Auth::user()->name;

        $save->save();

        $criminal_picture = new CriminalPicture();
        $criminal_picture->criminal_id = $save->id;
        $criminal_picture->path = $filename;
        $criminal_picture->save();

        $id = $save->id;
//                return redirect()->route('crimnal')->with('success', 'Criminal record created successfully.');
        return redirect()->route('criminal_picture', compact('id'))->with('success', 'مجریم ادد شو اوس عکس اضافه کړی!');
    }
    public function edit($id)
    {
        $criminal = criminal::with(['case','picture','suspect'])->find($id);
        $cases=casemodel::all();
        $suspects = suspectmodel::all();
        return view('criminal.edit', compact( 'criminal','cases','suspects'));
    }
    public function update(Request $request, string $id)
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
        if (!empty($request->discription)) {
            $criminal->marital_status = $request->input('discription');
        }
        $criminal->family_members = $request->input('familymember');
        // Update other fields as necessary
        $criminal->save();
        // Redirect or return a response
        return redirect(url('/criminal/all/' . $id))->with('success', 'User updated successfully');
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
    public function picture($id)
    {
        return view('criminal.picture', compact('id'));
    }
    public function picture_save(Request $request, $id)
    {
        $save = new CriminalPicture();
        if (!empty($request->photo1)) {
            $exe = $request->file('photo1')->getClientOriginalExtension();
            //            dd($exe);
            $file = $request->file('photo1');
            $rename = str::random(20);
            $filename1 = $rename . '.' . $exe;
            $file->move('criminal/', $filename1);
        }
        $save->criminal_id = $id;
        $save->path = $filename1;
        $save->save();
        $save = new CriminalPicture();
        if (!empty($request->photo1)) {
            $exe = $request->file('photo2')->getClientOriginalExtension();
            //            dd($exe);
            $file = $request->file('photo2');
            $rename = str::random(20);
            $filename2 = $rename . '.' . $exe;
            $file->move('criminal/', $filename2);
        }
        $save->criminal_id = $id;
        $save->path = $filename2;
        $save->save();
        $save = new CriminalPicture();
        if (!empty($request->photo1)) {
            $exe = $request->file('photo3')->getClientOriginalExtension();
            //            dd($exe);
            $file = $request->file('photo3');
            $rename = str::random(20);
            $filename3 = $rename . '.' . $exe;
            $file->move('criminal/', $filename3);
        }
        $save->criminal_id = $id;
        $save->path = $filename3;
        $save->save();

        $save = new CriminalPicture();
        if (!empty($request->photo1)) {
            $exe = $request->file('photo4')->getClientOriginalExtension();
            //            dd($exe);
            $file = $request->file('photo4');
            $rename = str::random(20);
            $filename4 = $rename . '.' . $exe;
            $file->move('criminal/', $filename4);
        }
        $save->criminal_id = $id;
        $save->path = $filename4;
        $save->save();
        return redirect()->route('crimnal')->with('success', 'Criminal record created successfully.');
    }
    public function show_picture($id)
    {
        $pictures = CriminalPicture::where('criminal_id', '=', $id)->get();
        return view('criminal.picture_show', compact('pictures'));
    }
}
