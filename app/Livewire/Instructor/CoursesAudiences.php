<?php

namespace App\Livewire\Instructor;

use App\Models\Audience;
use App\Models\Course;
use Livewire\Component;

class CoursesAudiences extends Component
{
    public $course, $audience, $name, $newname;

    protected $rules = [
        'name' => 'required'
    ];

    public function mount(Course $course) {
        $this->course = $course;
        $this->audience = new Audience();
    }
    
    public function render()
    {
        return view('livewire.instructor.courses-audiences');
    }

    public function store(){
        $this->validate(['newname' => 'required']);
        $this->course->audiences()->create([
            'name' => $this->newname
        ]);
        $this->reset('newname');
    }

    public function edit(Audience $audience) {
        $this->audience = $audience;
        $this->name = $audience->name;
    }

    public function update() {
        $this->validate();

        $this->audience->update([
            'name' => $this->name
        ]);

        $this->audience = new Audience();
    }

    public function destroy(Audience $audience){
        $audience->delete();
    }
}
