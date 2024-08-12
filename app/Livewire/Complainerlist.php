<?php

namespace App\Livewire;

use App\Models\People;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

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
            // dd($this->searchInput);
            $query->where('name', 'like', '%' . $this->searchInput . '%')
                ->orWhere('last_name', 'like', '%' . $this->searchInput . '%')
                ->orWhere('father_name', 'like', '%' . $this->searchInput . '%')
                ->orWhere('phone', 'like', '%' . $this->searchInput . '%')
                ->orWhere('tazkira_number', 'like', '%' . $this->searchInput . '%')
                ->orWhere('actual_address', 'like', '%' . $this->paginationTheme . '%')
                ->orWhere('current_address', 'like', '%' . $this->searchInput . '%');
        }
        if(Auth::user()->type==2){
            $data = $query->with('user')->where('Created_by',Auth::user()->id)->orderby('id', 'desc')->paginate(10);

        }else{
            $data = $query->with('user')->orderby('id', 'desc')->paginate(10);

        }

        return view('livewire.complainerlist', ['data' => $data]);
    }
}
