<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('contacts');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/dashboard', 'ContactController@index')->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [ContactController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/dashboard/contacts', [ContactController::class, 'store'])->name('contacts.store');

Route::get('/dashboard/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::put('/dashboard/{contact}', [ContactController::class, 'update'])->name('contacts.update');

Route::delete('/dashboard/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

Route::get('/dashboard/search', [ContactController::class, 'search'])->name('contacts.search');

Route::get('/dashboard/filter', [ContactController::class, 'filter'])->name('contacts.filter');

Route::get('/dashboard/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/dashboard/categories', [CategoryController::class, 'store'])->name('categories.store');

require __DIR__.'/auth.php';
