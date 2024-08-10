<?php

namespace App\Livewire;

use App\Models\criminal;
use App\Models\suspectmodel;
use App\Models\People;
use Livewire\Component;
use Livewire\WithPagination;
class SearchRecords extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
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
            $query->where('actual_address', 'like', '%' . $this->address . '%')->orWhere('current_address', 'like', '%' . $this->address . '%');
        }

        if ($this->dob) {
            $query->whereDate('dob', $this->dob);
        }

        $criminals = $query->paginate(5);

        // Check if there are no results in the criminal search
        if ($criminals->isEmpty()) {
            $suspectQuery = suspectmodel::query();

            if ($this->name) {
                $suspectQuery->where('name', 'like', '%' . $this->name . '%');
            }

            if ($this->father_name) {
                $suspectQuery->where('father_name', 'like', '%' . $this->father_name . '%');
            }

            if ($this->last_name) {
                $suspectQuery->where('last_name', 'like', '%' . $this->last_name . '%');
            }

            if ($this->id) {
                $suspectQuery->where('id', $this->id);
            }

            if ($this->phone) {
                $suspectQuery->where('phone', 'like', '%' . $this->phone . '%');
            }

            if ($this->email) {
                $suspectQuery->where('email', 'like', '%' . $this->email . '%');
            }

            if ($this->address) {
                $suspectQuery->where('address', 'like', '%' . $this->address . '%');
            }

            if ($this->dob) {
                $suspectQuery->whereDate('dob', $this->dob);
            }

            $suspects = $suspectQuery->paginate(5);

        if ($suspects->isEmpty()){
            $peopleQuery = People::query();

            if ($this->name) {
                $peopleQuery->where('name', 'like', '%' . $this->name . '%');
            }

            if ($this->father_name) {
                $peopleQuery->where('father_name', 'like', '%' . $this->father_name . '%');
            }

            if ($this->last_name) {
                $peopleQuery->where('last_name', 'like', '%' . $this->last_name . '%');
            }

            if ($this->id) {
                $peopleQuery->where('id', $this->id);
            }

            if ($this->phone) {
                $peopleQuery->where('phone', 'like', '%' . $this->phone . '%');
            }
                $peoples=$peopleQuery->paginate('5');
        }
        }

        return view('livewire.search-records', [
        'criminals' => $criminals ,
//        'peoples' => $peoples,
        'suspects' => $suspects ?? [],]);
    }
    public function updated($propertyName)
    {
        $this->render();
    }
}
