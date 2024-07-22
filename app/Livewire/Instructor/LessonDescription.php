<?php

namespace App\Livewire\Instructor;

use App\Models\Lesson;
use Livewire\Component;

class LessonDescription extends Component
{
    public $lesson, $description, $desname;

    protected $rules = [
        'description' => 'required'
    ];

    public function mount(Lesson $lesson) {
        $this->lesson = $lesson;
        if($lesson->description){
            $this->description = $lesson->description;
            $this->desname = $this->description->name;
        }
    }

    public function render()
    {
        return view('livewire.instructor.lesson-description');
    }

    public function store() {
        $this->validate(['desname' => 'required']);
        $this->lesson->description()->create([ 'name' => $this->desname ]);
    }

    public function update() {
        $this->validate();
        $this->description->update([
            'name' => $this->desname
        ]);
    }

    public function destroy(Lesson $lesson) {
        $lesson->description->delete();
        $this->reset('description', 'desname');
    }
}
