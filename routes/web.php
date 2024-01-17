<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupportController;

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
    return view('0pages.w2');
})->name('root');
Route::get('/about', function () {
    return view('0pages.about');
})->name('about');
Route::get('/doctors', function () {
    return view('0pages.doctors');
})->name('doctors');
Route::get('/gallery', function () {
    return view('0pages.gallery');
})->name('gallery');
Route::get('/blog', function () {
    return view('0pages.blog');
})->name('blog');
Route::get('/contact', function () {
    return view('0pages.contact');
})->name('contact');
Route::get('/privacy', function () {
    return view('0pages.privacy');
})->name('privacy');
Route::get('/terms', function () {
    return view('0pages.terms');
})->name('terms');

//User Routes
Route::get('/patient', [ProfileController::class, 'index'])->middleware(['auth'])->name('student.dashboard');
Route::get('/student', [ProfileController::class, 'index2'])->middleware(['auth']);
// })->->name('dashboard');


Route::middleware('auth')->prefix('patient')->name('student.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'view'])->name('profile.view');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Appointment Routes
    Route::get('/appointment', [AppointmentController::class, 'index2'])->name('appointment.index');

    //Support Routes
    Route::get('support/{id}/delete', [SupportController::class, 'destroy']);
    Route::resource('support', SupportController::class);
    //Balance Routes

});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/staff.php';
