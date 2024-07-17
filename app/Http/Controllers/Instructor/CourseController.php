<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('instructor.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $levels = Level::all();
        $prices = Price::all();
        return view('instructor.courses.create', compact('categories', 'levels', 'prices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'image_curso' => 'image'
        ]);

        $course = Course::create($request->all());

        if($request->file('image_curso')){
            $url = Storage::put('courses', $request->file('image_curso'));
            $course->image()->create([ 'url' => $url ]);
        }

        return redirect()->route('instructor.courses.edit', $course);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('instructor.courses.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $categories = Category::all();
        $levels = Level::all();
        $prices = Price::all();

        return view('instructor.courses.edit', compact('course', 'categories', 'levels', 'prices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,'.$course->id,
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'image_curso' => 'image'
        ]);

        $course->update($request->all());

        if($request->file('image_curso')){
            
            $url = Storage::put('courses', $request->file('image_curso'));

            if($course->image){
                //if(file_exists(public_path($course->image->url))){
                    Storage::delete($course->image->url);
                //}
                $course->image()->update([ 'url' => $url ]);
            }else{
                $course->image()->create([ 'url' => $url ]);
            }
        }
        
        return redirect()->route('instructor.courses.edit', $course);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
