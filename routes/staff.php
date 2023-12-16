<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\Staff\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Staff\EmailController;
use App\Http\Controllers\Staff\Auth\AuthenticatedSessionController;
//Staff Routes
Route::namespace('Staff')->prefix('staff')->name('staff.')->group(function(){
    Route::namespace('Auth')->middleware('guest:staff')->group(function(){
        //Login Route
        Route::get('login',[AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login',[AuthenticatedSessionController::class, 'store'])->name('login');
    });
    Route::middleware('staff')->group(function () {
        Route::get('/',[HomeController::class, 'index'])->name('dashboard');
        Route::get('logout',[AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
    
});

Route::middleware('staff')->prefix('staff')->name('staff.')->group(function () {

    // Email Crud
    Route::get('email/{id}/delete', [EmailController::class,'destroy']);
    Route::resource('email', EmailController::class);
    //Profile
    Route::get('/profile', [HomeController::class, 'view'])->name('profile.view');
    Route::get('/profile/edit', [HomeController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [HomeController::class, 'update'])->name('profile.update');
    //Suport Ticekts View And Reply
    Route::get('support', [SupportController::class,'staffIndex'])->name('support.index');
    Route::get('support/{id}', [SupportController::class,'staffAdmin'])->name('support.show');
    Route::get('support/{id}/reply', [SupportController::class,'staffReply'])->name('support.reply');
    Route::put('support/{id}', [SupportController::class,'staffReplyUpdate'])->name('support.replyUpdate');

    //Appointment
    Route::resource('appointment', AppointmentController::class);
    Route::get('appointment/{id}/delete', [AppointmentController::class,'destroy']);



});
