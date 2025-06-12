<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Models\Patients;
use App\Models\VitalSigns;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')
    ->controller(AuthController::class)
    ->group(function () {
        Route::get('/login', 'showLoginPage')->name('login');
        Route::post('/login', 'login')->name('auth.login');
    });

Route::middleware('auth:admin')->group(function() {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', function() {
        $total_patients = Patients::count();
        $new_today = Patients::whereDate('created_at', today())->count();
        $alerts = VitalSigns::where('temperature','>',38)->count();

        return view('app.pages.dashboard.index', compact(
            'total_patients','new_today','alerts'
        ));
    })->name('dashboard');

    Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::prefix('patients')
        ->name('patients.')
        ->controller(PatientController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index.page');
            Route::get('/create', 'create')->name('create.page');
            Route::post('/create', 'store')->name('create');
            Route::get('/{patient}', 'edit')->name('edit');
            Route::put('/{patient}', 'update')->name('update');
            Route::delete('/{patient}', 'destroy')->name('destroy');
        });
});

