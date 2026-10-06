<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DeviceRequestController;
use App\Http\Controllers\DeviceSensorController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\SensorController as AdminSensorController;
use App\Http\Controllers\Admin\DeviceController as AdminDeviceController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Route::view('contact', 'contact')->name('contact');
Route::view('faq', 'faq')->name('faq');


Route::middleware('auth')->group(function () {
    Route::resource('devices', DeviceController::class)->except(['edit', 'update']);

    Route::get('devices/sensors/create', [DeviceSensorController::class, 'create'])->name('devices.sensors.create');
    Route::post('devices/sensors', [DeviceSensorController::class, 'store'])->name('devices.sensors.store');
    Route::delete('devices/sensors/delete', [DeviceSensorController::class, 'destroy'])->name('devices.sensors.destroy');


});

Route::middleware(['auth', 'admin'])->group(function () {


    Route::resource('sensors.keys', DeviceRequestController::class)->only(['create', 'store']);

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('sensors/create', [AdminSensorController::class, 'create'])->name('sensors.create');
        Route::post('sensors', [AdminSensorController::class, 'store'])->name('sensors.store');
        Route::get('sensors/{sensor}', [AdminSensorController::class, 'show'])->name('sensors.show');

        Route::get('devices', [AdminDeviceController::class, 'index'])->name('devices.index');
        Route::get('devices/{device}', [AdminDeviceController::class, 'show'])->name('devices.show');
        Route::delete('devices/{device}', [AdminDeviceController::class, 'destroy'])->name('devices.destroy');

        Route::get('users', [AdminUserController::class, 'index'])->name('users.index');
        Route::patch('users/{user}/role', [AdminUserController::class, 'updateRole'])->name('users.role');
        Route::delete('users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    });
});
