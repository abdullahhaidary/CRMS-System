<?php

namespace App\Livewire;

use App\Models\casemodel;
use App\Models\criminal;
use App\Models\CriminalPicture;
use App\Models\suspectmodel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
class CriminalRegister extends Component
{
    public $isSuspectAvailable = 0; // Initialize as integer (0 for No, 1 for Yes)
    public $name;
    public $fatherName;
    public $lname;
    public $father_name;
    public $phone;
    public $email;
    public $current_address;
    public $actual_address;
    public $dateofbirth;
    public $gender;
    public $job;
    public $marital_status;
    public $familymember;
    public $discription;
    public $photo;
    public $suspect;
    public $case;
    public $suspects = [];
    public $selectedSuspect;
    public $search;
    public function updatedSearch()
    {
        $this->suspects = suspectmodel::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('father_name', 'like', '%' . $this->search . '%')
            ->orWhere('id', 'like', '%' . $this->search . '%')
            ->get()
            ->toArray();
    }


    public function selectSuspect($suspectId)
    {
        $this->selectedSuspect = $suspectId;
        $this->search = suspectmodel::find($suspectId)->name;
        $this->suspects = [];
    }

    public function render()
    {
        // $suspects = suspectmodel::query()
        //     ->when($this->search, function($query) {
        //         $query->where('name', 'like', '%' . $this->search . '%')
        //               ->orWhere('father_name', 'like', '%' . $this->search . '%')
        //               ->orWhere('id', 'like', '%' . $this->search . '%');
        //     })
        //     ->get();
        $case = casemodel::all();
        return view('livewire.criminal-register',
        ['isSuspectAvailable'=>$this->isSuspectAvailable,
        'case'=>$case,
        // 'suspects' => $suspects

        ]
    );
    }
    public function submit()
    {
        $this->validate();

        $save = new criminal();
        $save->suspect_id = $this->suspect;
        $save->case_id = $this->case;
        $save->criminal_name = $this->name;
        $save->last_name = $this->lname;
        $save->father_name = $this->father_name;
        $save->phone = $this->phone;
        $save->email = $this->email;
        $save->current_address = $this->current_address;
        $save->actual_address = $this->actual_address;
        $save->arrest_date = Carbon::parse($this->arrest_date)->format('Y-m-d H:i:s');
        $save->date_of_birth = Carbon::parse($this->dateofbirth)->format('Y-m-d H:i:s');
        $save->gender = $this->gender;
        $save->job = $this->job;
        $save->marital_status = $this->marital_status;
        $save->family_members = $this->familymember;
        $save->suspect_id = $this->suspect;
        $save->case_id = $this->case;
        $save->created_by = Auth::user()->name;

        if (!empty($this->photo)) {
            $exe = $this->photo->getClientOriginalExtension();
            $rename = Str::random(20);
            $filename = $rename . '.' . $exe;
            $this->photo->storeAs('criminal', $filename);
            $save->photo = $filename;
        }

        $save->save();

        $criminal_picture = new CriminalPicture();
        $criminal_picture->criminal_id = $save->id;
        $criminal_picture->path = $filename;
        $criminal_picture->save();

        $id = $save->id;
        return redirect()->route('criminal_picture', compact('id'))->with('success', "مجریم ادد شو اوس عکس اضافه کړی!");
    }
}
