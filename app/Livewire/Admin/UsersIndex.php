<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
        ->orwhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.admin.users-index', compact('users'));
    }

    public function limpiar_page(){
        $this->resetPage('page');
    }
}
