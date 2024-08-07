<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesStudents extends Component
{
    use WithPagination;

    public $course, $search;

    public function mount(Course $course) {
        $this->course = $course;
        $this->authorize('dicatated', $course);
    }

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render()
    {
        $students = $this->course->students()->where('name', 'LIKE', '%'.$this->search.'%')->paginate(5);

        return view(
            'livewire.instructor.courses-students', 
            compact('students')
        )->layout('layouts.instructor', ['course' => $this->course]);
    }
}
