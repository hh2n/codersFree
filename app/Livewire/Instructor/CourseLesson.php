<?php

namespace App\Livewire\Instructor;

use App\Models\Lesson;
use App\Models\Platform;
use App\Models\Section;
use Livewire\Component;
use PgSql\Lob;

class CourseLesson extends Component
{
    public $section, $lesson, $platforms;
    public $name, $platform_id=1, $url;

    protected $rules = [
        'name' => 'required',
        'platform_id' => 'required',
        'url' => ['required', 'regex:% ^(?:https?:)?(?:\/\/)?(?:youtu\.be\/|(?:www\.|m\.)?youtube\.com\/(?:watch|v|embed)(?:\.php)?(?:\?.*v=|\/))([a-zA-Z0-9\_-]{7,15})(?:[\?&][a-zA-Z0-9\_-]+=[a-zA-Z0-9\_-]+)*$%x'] 
        //'url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x']
    ];

    public function mount(Section $section) {
        $this->section = $section;
        $this->platforms = Platform::all();
        $this->lesson = new Lesson();
    }

    public function render()
    {
        return view('livewire.instructor.course-lesson');
    }

    public function store() {

        if($this->platform_id == 2){
            $this->rules['url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }

        $this->validate();

        Lesson::create([
            'name' => $this->name,
            'platform_id' => $this->platform_id,
            'url' => $this->url,
            'section_id' => $this->section->id
        ]);

        $this->reset(['name', 'platform_id', 'url']);

    }

    public function edit(Lesson $lesson) {
        $this->resetValidation();
        $this->lesson = $lesson;
        $this->name = $lesson->name;
        $this->platform_id = $lesson->platform_id;
        $this->url = $lesson->url;
    }

    public function update() {
        if($this->platform_id == 2){
            $this->rules['url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }
        $this->validate();
        $this->lesson->update([
            'name' => $this->name,
            'platform_id' => $this->platform_id,
            'url' => $this->url
        ]);
        $this->lesson = new Lesson();
    }

    public function destroy(Lesson $lesson) {
        $lesson->delete();
    }

    public function cancel() {
        $this->lesson = new Lesson();
    }
}
