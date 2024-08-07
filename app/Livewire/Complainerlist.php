<?php

namespace App\Livewire;

use App\Models\People;
use Livewire\Component;
use Livewire\WithPagination;

class Complainerlist extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $data = People::paginate(10);
        return view('livewire.complainerlist', ['data' => $data]);
    }
}
