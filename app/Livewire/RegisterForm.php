<?php

namespace App\Livewire;

use App\Models\District;
use App\Models\Province;
use App\Models\ProvinceAccount; // Ensure the model name matches exactly
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterForm extends Component
{
    public $provinces;
    public $districts = [];
    public $selectedProvince = null;
    public $selectedDistrict = null;
    public $name;
    public $email;
    public $password;

    public function mount()
    {
        $this->provinces = Province::all();
    }

    public function updatedSelectedProvince($provinceId)
    {
        $this->districts = District::where('province_id', $provinceId)->get();
        $this->selectedDistrict = null; // Reset district selection
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|min:3|max:35',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'selectedProvince' => 'required',
            'selectedDistrict' => 'required',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'type' => 3,
            'action' => 1,
            'password' => Hash::make($this->password),
        ]);

        $provinceAccount = new ProvinceAccount(); // Ensure the model name is correct
        $provinceAccount->user_id = $user->id;
        $provinceAccount->province = $this->selectedProvince;
        $provinceAccount->district = $this->selectedDistrict;
        $provinceAccount->save();

//        session()->flash('success', 'نوی یوزر په موفقیت ذخیره شو!');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
