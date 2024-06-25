<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseStatus extends Component
{
    public function mount(Course $course) {
        $this->course = $course;
    }

    public function render()
    {
        return view('livewire.course-status');
    }
}