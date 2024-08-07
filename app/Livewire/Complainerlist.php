<?php

namespace App\Livewire;

use App\Models\People;
use Livewire\Component;
use Livewire\WithPagination;

class Complainerlist extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchInput;
    public function search()
    {
        // No need to do anything here, as Livewire will automatically re-render the component when properties change
    }

    public function render()
    {
        $query = People::query();

        if ($this->searchInput) {
            $query->where('name', 'like', '%' . $this->paginationTheme . '%')
                ->orWhere('last_name', 'like', '%' . $this->paginationTheme . '%');
                // ->orWhere('father_name', 'like', '%' . $this->paginationTheme . '%')
                // ->orWhere('phone', 'like', '%' . $this->paginationTheme . '%')
                // ->orWhere('tazkira_number', 'like', '%' . $this->paginationTheme . '%')
                // ->orWhere('actual_address', 'like', '%' . $this->paginationTheme . '%')
                // ->orWhere('current_address', 'like', '%' . $this->paginationTheme . '%');
        }
        $data = $query->paginate(10);

        return view('livewire.complainerlist', ['data' => $data]);
    }
}
