<?php

namespace App\Http\Controllers;

use App\Models\FingerprintModel;
use App\Models\suspectmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class suspectController extends Controller
{
    public function index($id){

        $suspects=suspectmodel::where('suspect.crime_record_id','=',$id)
            ->paginate('5');
        return view('suspect.index',compact('suspects','id'));
    }
    public function all_list()
    {
        $suspects=suspectmodel::paginate('8');
        return view('suspect.all_list', compact('suspects'));
    }

public function create($id)
{
    return view('suspect.suspect_form',compact('id'));
}
public function store(Request $request ,$id)
{
//    dd($id);
    $save=new suspectmodel();
    $save->crime_record_id=$id;
    $save->name=$request->suspect_name;
    $save->last_name=$request->last_name;
    $save->father_name=$request->father_name;
    $save->phone=$request->phone;
    $save->tazcira_number=$request->tazkera_number;
    $save->actual_address=$request->main_address;
    $save->current_address=$request->current_address;
    $save->isCriminal=0;
$save->save();
return redirect(url('/suspect_list/'.$id));

}
    public function edit($id)
    {
        $data=suspectmodel::where('suspect.id', '=', $id)->get();
        return view('suspect.edit',compact('data','id'));
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
    $criminal = suspectmodel::findOrFail($id);

    // Update the user's data suspect
    $criminal->name = $request->input('suspect_name');
    $criminal->last_name = $request->input('last_name');
    $criminal->father_name = $request->input('father_name');
    $criminal->tazcira_number = $request->input('tazcira_number');
    $criminal->phone = $request->input('phone_number');
    $criminal->actual_address = $request->input('main_address');
    $criminal->current_address = $request->input('current_address');


    // Update other fields as necessary
    $criminal->save();

    // Redirect or return a response
    return redirect(url('/suspect_list/'.$id))->with('success', 'تغیرات په موافقیت انجام شد!');
}
public function destroy($id)
{
    $resource = suspectmodel::findOrFail($id);

    // Delete the resource
    $resource->delete();

    // Redirect or return a response
    return redirect()->back()->with('success', 'دیتا په موافقیت ذخیره شوه !');

}


    public function finger_print_add($id){
        $data=DB::table('suspect')->select('suspect.*')->where('suspect.id','=', $id)->get();
        $suspect = suspectmodel::find($id)->first();
        return view('suspect.suspect_finger_add',compact('suspect','data'));
    }

    public function store_finger_print(Request $request){
        $fingerprints = new FingerprintModel();
        $fingerprints->suspect_id = $request->id;
        $fingerprints->Leftbmpbase64image = $request->Leftbmpbase64image;
        $fingerprints->right_thumb = $request->RightThumb;
        $fingerprints->right_thumb = $request->RightThumb;
        $fingerprints->left_thumb = $request->LeftThumb;
        $fingerprints->right_index = $request->RightIndex;
        $fingerprints->left_index = $request->LeftIndex;
        $fingerprints->save();
        return redirect()->back();
    }
    public function match(Request $request)
    {
        return response($request);
        $templateBase64 = $request->template_base64;
        $fingerprint = FingerprintModel::where('left_thumb', $templateBase64)->first();
        return response($fingerprint);
        if ($fingerprint) {
            return response()->json(['found' => true, 'match' => $fingerprint]);
        } else {
            return response()->json(['found' => false, 'message' => 'No match found.']);
        }
    }
}
