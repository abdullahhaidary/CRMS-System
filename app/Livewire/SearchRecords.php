<?php

namespace App\Livewire;

use App\Models\criminal;
use Livewire\Component;

class SearchRecords extends Component
{

    public $name;
    public $father_name;
    public $last_name;
    public $id = '';
    public $phone;
    public $email;
    public $address;
    public $dob;
    public function render()
    {
        $query = criminal::query();

        if ($this->name) {
            $query->where('criminal_name', 'like', '%' . $this->name . '%');
        }

        if ($this->father_name) {
            $query->where('father_name', 'like', '%' . $this->father_name . '%');
        }

        if ($this->last_name) {
            $query->where('last_name', 'like', '%' . $this->last_name . '%');
        }

        if ($this->id) {
            $query->where('id', $this->id);
        }

        if ($this->phone) {
            $query->where('phone', 'like', '%' . $this->phone . '%');
        }

        if ($this->email) {
            $query->where('email', 'like', '%' . $this->email . '%');
        }

        if ($this->address) {
            $query->where('actual_address', 'like', '%' . $this->address . '%')
                  ->orWhere('current_address', 'like', '%' . $this->address . '%');
        }

        if ($this->dob) {
            $query->whereDate('dob', $this->dob);
        }

        $criminals = $query->get();
        return view('livewire.search-records', compact('criminals'));
    }
    public function updated($propertyName)
    {
        $this->render();
    }

}
