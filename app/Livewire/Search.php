<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Search extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.search');
    }

    //Propiedad computada 
    #[Computed]
    public function results(){
        
        return Course::where('title', 'LIKE', '%'.$this->search.'%')->where('status', 3)->take(8)->get();
    }

}
