<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {

        $courses = Course::where("title", "LIKE", "%".$this->search."%")
                ->where('user_id', auth()->user()->id)
                ->latest()
                ->paginate(8);
        return view('livewire.instructor.courses-index', compact('courses'));
    }

    public function limpiar_page(){
        $this->resetPage('page');
    }
}
