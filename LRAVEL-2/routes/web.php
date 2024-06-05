<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Models\Students;

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
Route::controller(StudentsController::class)->group(function () {
    Route::get('/students', 'index')->name('students.index');
    Route::get('/students/create', 'create')->name('students.create');
    Route::post('/students', 'store')->name('students.store');
    Route::get('/students/{student}/edit', 'edit')->name('students.edit');
    Route::put('/students/{student}', 'update')->name('students.update');
    Route::delete('/students/{student}', 'destroy')->name('students.destroy');
});


// Routes for Product CRUD
Route::get('/Products', [ProductsController::class, 'index'])->name('Products.index');
Route::get('/Products/create', [ProductsController::class, 'create'])->name('Products.create');
Route::post('/Products', [ProductsController::class, 'store'])->name('Products.store');
Route::get('/Products/{Product}/edit', [ProductsController::class, 'edit'])->name('Products.edit');
//Route::put('/Products/{Product}', [ProductsController::class, 'update'])->name('Products.update');
Route::put('/products/{id}', [ProductsController::class, 'update'])->name('Products.update');

Route::delete('/Products/{Product}', [ProductsController::class, 'destroy'])->name('Products.destroy');

// Routes for Category CRUD
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Routes for Subcategory CRUD
Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('subcategories.index');
Route::get('/subcategories/create', [SubcategoryController::class, 'create'])->name('subcategories.create');
Route::post('/subcategories', [SubcategoryController::class, 'store'])->name('subcategories.store');
Route::get('/subcategories/{subcategory}/edit', [SubcategoryController::class, 'edit'])->name('subcategories.edit');
Route::put('/subcategories/{subcategory}', [SubcategoryController::class, 'update'])->name('subcategories.update');
Route::delete('/subcategories/{subcategory}', [SubcategoryController::class, 'destroy'])->name('subcategories.destroy');