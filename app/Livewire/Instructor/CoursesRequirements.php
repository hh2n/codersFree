<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use App\Models\Requirement;
use Livewire\Component;

class CoursesRequirements extends Component
{
    public $course, $requirement, $name, $newname;

    protected $rules = [
        'name' => 'required'
    ];

    public function mount(Course $course) {
        $this->course = $course;
        $this->requirement = new Requirement();
    }

    public function render()
    {
        return view('livewire.instructor.courses-requirements');
    }

    public function store(){
        $this->validate(['newname' => 'required']);
        $this->course->requirements()->create([
            'name' => $this->newname
        ]);
        $this->reset('newname');
    }

    public function edit(Requirement $requirement) {
        $this->requirement = $requirement;
        $this->name = $requirement->name;
    }

    public function update() {
        $this->validate();

        $this->requirement->update([
            'name' => $this->name
        ]);

        $this->requirement = new Requirement();
    }

    public function destroy(Requirement $requirement){
        $requirement->delete();
    }
}
