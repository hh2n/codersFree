<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;
use App\Models\Course;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    use AuthorizesRequests;
    
    public function index(){

        $courses = Course::where('status', 2)->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    /* *** ** Mostrar vista **** * */
    public function show(Course $course) {

        $this->authorize('revision', $course);

        return view('admin.courses.show', compact('course'));
    }

    /* *** Aprobar curso en estado de revision = 2 *** */
    public function approved(Course $course) {
        
        $this->authorize('revision', $course);

        if(!$course->lessons || !$course->goals || !$course->requirements || !$course->image){
            return back()->with('info', 'No se puede publicar un curso que no esté completo.');
        }

        $course->status = 3;
        $course->save();

        $mail = new ApprovedCourse($course);
        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')->with('info', 'El curso se publicó con éxito.');
    }

    public function observation(Course $course) {
        return view('admin.courses.observation', compact('course'));
    }

    public function reject(Request $request, Course $course) {

        $request->validate([
            'body' => 'required'
        ]);

        $course->observation()->create($request->all());
        $course->status = 1;
        $course->save();

        //Enviando correo electronico
        $mail = new RejectCourse($course);

        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')->with('info', 'El curso se ha rechazado con éxito.');

    }
}
