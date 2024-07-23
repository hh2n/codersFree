<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use App\Models\Goal;
use Livewire\Component;

class CoursesGoals extends Component
{
    public $course, $goal, $name, $newname;

    protected $rules = [
        'name' => 'required'
    ];

    public function mount(Course $course) {
        $this->course = $course;
        $this->goal = new Goal();
    }

    public function render()
    {
        return view('livewire.instructor.courses-goals');
    }

    public function store(){
        $this->validate(['newname' => 'required']);
        $this->course->goals()->create([
            'name' => $this->newname
        ]);
        $this->reset('newname');
    }

    public function edit(Goal $goal) {
        $this->goal = $goal;
        $this->name = $goal->name;
    }

    public function update() {
        $this->validate();

        $this->goal->update([
            'name' => $this->name
        ]);

        $this->goal = new Goal();
    }

    public function destroy(Goal $goal){
        $goal->delete();
    }
}
