<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\LabTestController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\Staff\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorOptionController;
use App\Http\Controllers\Staff\AdmissionController;
use App\Http\Controllers\Staff\EmailController;
use App\Http\Controllers\Staff\StudentController;
use App\Http\Controllers\Staff\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Staff\OperationController;

//Staff Routes
Route::namespace('Staff')->prefix('staff')->name('staff.')->group(function () {
    Route::namespace('Auth')->middleware('guest:staff')->group(function () {
        //Login Route
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
    });
    Route::middleware('staff')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
        Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});

Route::middleware('staff')->prefix('staff')->name('staff.')->group(function () {

    // Email Crud
    Route::get('email/{id}/delete', [EmailController::class, 'destroy']);
    Route::resource('email', EmailController::class);
    //Profile
    Route::get('/profile', [HomeController::class, 'view'])->name('profile.view');
    Route::get('/profile/edit', [HomeController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [HomeController::class, 'update'])->name('profile.update');
});

Route::middleware('userType:doctor')->prefix('staff')->name('staff.')->group(function () {
    Route::get('information/{id}&{information}/delete', [DoctorOptionController::class, 'destroy'])->name('information.delete');
    Route::get('information/{information}/create1', [DoctorOptionController::class, 'create1'])->name('information.create1');
    Route::resource('information', DoctorOptionController::class);
    //Appointment
    Route::get('appointments/data', [AppointmentController::class, 'indexDoctor'])->name('appointments.index');
    Route::get('appointments/data/{id}', [AppointmentController::class, 'showDoctor'])->name('appointments.show');
    Route::get('appointments/visit/{id}', [AppointmentController::class, 'editDoctor'])->name('appointments.edit');
    Route::post('appointments/visit/update', [AppointmentController::class, 'updateDoctor'])->name('appointments.update');
    //Admission Visits
    Route::get('admissionvisits', [AdmissionController::class, 'admissionvisits'])->name('admissionvisits.index');
    Route::get('admissionvisits/create/{id}', [AdmissionController::class, 'addVisit'])->name('admissionvisits.create');
    Route::get('admissionvisits/show/{id}', [AdmissionController::class, 'showVisits'])->name('admissionvisit.show');
    Route::post('admissionvisits/create/store', [AdmissionController::class, 'addVisitStore'])->name('addmission.visit');
});
Route::middleware('userType:staff')->prefix('staff')->name('staff.')->group(function () {

    //Suport Ticekts View And Reply
    Route::get('support', [SupportController::class, 'staffIndex'])->name('support.index');
    Route::get('support/{id}', [SupportController::class, 'staffAdmin'])->name('support.show');
    Route::get('support/{id}/reply', [SupportController::class, 'staffReply'])->name('support.reply');
    Route::put('support/{id}', [SupportController::class, 'staffReplyUpdate'])->name('support.replyUpdate');
    // Patient Routes
    Route::get('patient/{id}/delete', [StudentController::class, 'destroy']);
    Route::resource('patient', StudentController::class);
    //Appointment Routes
    Route::get('appointment/{id}/bill', [BillController::class, 'appointmentBillAccept'])->name('appointment.bill');
    Route::get('appointment/{id}/delete', [AppointmentController::class, 'destroy'])->name('appointment.delete');
    Route::resource('appointment', AppointmentController::class);
    //Appointment Routes
    Route::get('labtest/{id}/bill', [BillController::class, 'labTestBillAccept'])->name('labtest.bill');
    Route::get('labtest/{id}/delete', [LabTestController::class, 'destroy'])->name('labtest.delete');
    Route::resource('labtest', LabTestController::class);
    //Operation Routes
    Route::get('operation/{id}/bill', [BillController::class, 'operationBillAccept'])->name('operation.bill');
    Route::get('operation/create1/{id}', [OperationController::class, 'create1'])->name('operation.create1');
    Route::get('operation/{id}/delete', [OperationController::class, 'destroy'])->name('operation.delete');
    Route::resource('operation', OperationController::class);
    //Admission Routes
    Route::get('admission/{id}/bill', [BillController::class, 'admissionBillAccept'])->name('admission.bill');
    Route::get('admission/{id}/checkout', [AdmissionController::class, 'checkout'])->name('admission.checkout');
    Route::get('admission/{id}/delete', [AdmissionController::class, 'destroy'])->name('admission.delete');
    Route::get('booking/available-rooms/{checkin_date}', [AdmissionController::class, 'available_rooms']);
    Route::resource('admission', AdmissionController::class);
    //Bill Routes
    Route::post('bill/generate', [BillController::class, 'generate'])->name('bill.generate');
    Route::get('bill/pay/{id}', [BillController::class, 'payBill'])->name('bill.pay');
    Route::resource('bill', BillController::class);
    //Emergency Routes
    Route::get('emergency/{id}/bill', [BillController::class, 'emergencyBillAccept'])->name('emergency.bill');
    Route::get('emergency/{id}/delete', [EmergencyController::class, 'destroy'])->name('emergency.delete');
    Route::resource('emergency', EmergencyController::class);
});
