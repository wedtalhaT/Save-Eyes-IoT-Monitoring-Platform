<?php

use App\Http\Controllers\Api\DeviceController;
use Illuminate\Support\Facades\Route;

Route::post('device/{uuid}/update', [DeviceController::class, 'update']);
