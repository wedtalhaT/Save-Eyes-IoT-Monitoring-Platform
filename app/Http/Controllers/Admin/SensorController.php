<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSensorRequest;
use App\Models\Sensor;

class SensorController extends Controller
{
    public function create()
    {
        return view('sensors.create');
    }

    public function store(StoreSensorRequest $request)
    {
        $sensor = Sensor::create($request->validated());

        return to_route('admin.sensors.show', $sensor->id)
            ->with('success', 'تم إضافة الحساس بنجاح');
    }

    public function show(Sensor $sensor)
    {
        $sensor->load('deviceRequests');

        return view('sensors.show', compact('sensor'));
    }
}

