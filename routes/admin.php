<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StaffDepartmentController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DegreeController;
use App\Http\Controllers\Admin\OperationController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\MedicineController;

//Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        //Login Route
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('adminlogin');
    });
    Route::middleware('admin')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
        Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    // Settings Crud
    Route::get('settings/', [HomeController::class, 'editSetting'])->name('settings.edit');
    Route::put('settings/update/{id}', [HomeController::class, 'updateSetting'])->name('settings.update');
    //Profile
    Route::get('/profile', [HomeController::class, 'view'])->name('profile.view');
    Route::get('/profile/edit', [HomeController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [HomeController::class, 'update'])->name('profile.update');
    // Email Crud
    Route::get('email/{id}/delete', [EmailController::class, 'destroy']);
    Route::resource('email', EmailController::class);

    // Student Routes
    Route::get('patient/{id}/delete', [StudentController::class, 'destroy']);
    Route::resource('patient', StudentController::class);

    // Department Routes
    Route::get('department/{id}/delete', [StaffDepartmentController::class, 'destroy']);
    Route::resource('department', StaffDepartmentController::class);

    // Test Crud 
    Route::get('test/{id}/delete', [TestController::class, 'destroy'])->name('test.delete');
    Route::resource('test', TestController::class);
    // Test Crud 
    Route::get('medicine/{id}/delete', [MedicineController::class, 'destroy'])->name('medicine.delete');
    Route::resource('medicine', MedicineController::class);

    // Room Type Crud 
    Route::get('roomtype/{id}/delete', [RoomTypeController::class, 'destroy'])->name('roomtype.delete');
    Route::resource('roomtype', RoomTypeController::class);

    // Room Crud 
    Route::get('rooms/{id}/delete', [RoomController::class, 'destroy'])->name('rooms.delete');
    Route::resource('rooms', RoomController::class);

    // Speciality Crud 
    Route::get('speciality/{id}/delete', [SpecialityController::class, 'destroy'])->name('speciality.delete');
    Route::resource('speciality', SpecialityController::class);

    // Degree Crud 
    Route::get('degree/{id}/delete', [DegreeController::class, 'destroy'])->name('degree.delete');
    Route::resource('degree', DegreeController::class);

    // Operation Crud 
    Route::get('operation/{id}/delete', [OperationController::class, 'destroy'])->name('operation.delete');
    Route::resource('operation', OperationController::class);

    // Staff Crud
    Route::get('staff/{id}/delete', [StaffController::class, 'destroy']);
    Route::get('staff/{id}/change', [StaffController::class, 'change']);
    Route::put('staff/{id}/changeUpdate', [StaffController::class, 'changeUpdate'])->name('staff.changeUpdate');
    Route::resource('staff', StaffController::class);

    //Suport Ticekts View
    Route::get('support', [SupportController::class, 'adminIndex'])->name('support.index');
    Route::get('support/{id}', [SupportController::class, 'showAdmin'])->name('support.show');
});
