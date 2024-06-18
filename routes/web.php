<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('cursos', function () {
    return "Aqui se mostrara la lista de cursos.";
})->name('courses.index');

Route::get('cursos/{course}', function ($course){
    return "Aqui se va a nmostrar la informacion del curso ... ";
})->name('course.show');