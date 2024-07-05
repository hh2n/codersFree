<?php

use App\Livewire\InstructorCourses;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'instructor/courses', 201);
Route::get('courses', InstructorCourses::class)->name('courses.index');