<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('patients.index');
});

Route::resource('patients', PatientController::class);

Route::get(
    '/patients/{patient}/visits/create',
    [VisitController::class, 'create']
)->name('visits.create');

Route::post(
    '/patients/{patient}/visits',
    [VisitController::class, 'store']
)->name('visits.store');