<?php

namespace App\Livewire;

use App\Models\suspectmodel;
use Livewire\Component;
use Livewire\WithPagination;

class Suspectsearch extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name;

    public function render()
    {
        $query = suspectmodel::query();

        if ($this->name) {
            $query->where('name', 'like', '%' . $this->name . '%')
            ->orWhere('last_name', 'like', '%' . $this->name . '%')
                ->orWhere('father_name', 'like', '%' . $this->name . '%')
                ->orWhere('phone', 'like', '%' . $this->name . '%')
                ->orWhere('tazcira_number', 'like', '%' . $this->name . '%')
                ->orWhere('actual_address', 'like', '%' . $this->name . '%')
                ->orWhere('current_address', 'like', '%' . $this->name . '%')
                ->orWhere('current_address', 'like', '%' . $this->name . '%')
                ->orWhere('current_address', 'like', '%' . $this->name . '%');
        }
        $suspects = $query->paginate(10);

        return view('livewire.suspectsearch', compact('suspects'));

    }
}
