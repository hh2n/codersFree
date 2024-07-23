<?php

use App\Http\Controllers\Instructor\CourseController;
use App\Livewire\Instructor\CoursesCurriculum;
use App\Livewire\Instructor\CoursesStudents;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'instructor/courses', 201);

Route::resource('courses', CourseController::class)->names('courses');

Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:Actualizar cursos')->name('courses.curriculum');

Route::get('course/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');

Route::get('course/{course}/students', CoursesStudents::class)->middleware('can:Actualizar cursos')->name('courses.students');

Route::post('course/{course}/status', [CourseController::class, 'status'])->name('courses.status');