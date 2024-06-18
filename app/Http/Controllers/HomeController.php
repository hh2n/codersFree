<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::where('status', 3)->latest()->get()->take(12);
        //return Course::find(14)->rating;
        return view('welcome', compact('courses'));
    }
}
