<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use App\Models\Section;
use Livewire\Component;

class CoursesCurriculum extends Component
{
    public $course, $section, $name, $newname;

    protected $rules = [
        'name' => 'required'
    ];

    public function mount(Course $course) {
        $this->course = $course;
        $this->section = new Section();
        $this->name = $course->name;
    }

    public function render()
    {
        return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor');
    }

    public function edit(Section $section) {
        $this->section = $section;
        $this->name = $section->name;
    }

    public function update() {

        $this->validate();

        $this->section->update(['name' => $this->name]);
        $this->section = new Section();
        session()->flash('message', 'Sección actualizada exitosamente!');
    }

    public function store() {

        $this->validate();

        Section::create([
            'name' => $this->newname,
            'course_id' => $this->course->id
        ]);
        $this->reset('newname');
    }

    public function destroy(Section $sectio) {
        $sectio->delete();
    }
}
