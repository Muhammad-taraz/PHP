<?php

use App\Http\Controllers\StudentsController;
use App\Models\Students;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
// Route::post('/students', [StudentsController::class, 'store'])->name('students.store');
// Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
// Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');
// Route::put('/students/{student}', [StudentsController::class, 'update'])->name('students.update');
// Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');

//Optimizing upper one 
Route::controller(StudentsController::class)->group(function(){
   Route::get('/students', 'index')->name('students.index');    
   Route::get('/students/create', 'create')->name('students.create');
   Route::post('/students', 'store')->name('students.store');
   Route::get('/students/{student}/edit', 'edit')->name('students.edit');
   Route::put('/students/{student}', 'update')->name('students.update');
   Route::delete('/students/{student}', 'destroy')->name('students.destroy');
});