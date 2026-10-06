<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachSensorToDeviceRequest;
use App\Models\Sensor;

class DeviceSensorController extends Controller
{
    public function create()
    {
        $devices = auth()->user()->devices()->get();
        $sensors = Sensor::all();

        return view('devices.add-sensor', compact('devices', 'sensors'));
    }

    public function store(AttachSensorToDeviceRequest $request)
    {
        $validated = $request->validated();

        $device = auth()->user()->devices()
            ->where('uuid', $validated['device_uuid'])
            ->firstOrFail();

        $device->sensors()->syncWithoutDetaching([$validated['sensor_id']]);

        return to_route('devices.show', $device->uuid)
            ->with('success', 'تم ربط الحساس بالجهاز بنجاح');
    }

    public function destroy(AttachSensorToDeviceRequest $request)
    {
        $device = auth()->user()->devices()->findOrFail($request->validated('device_uuid'));

        $device->sensors()->detach($request->validated('sensor_id'));

        return back()->with('success', 'تم فصل الحساس عن الجهاز بنجاح');
    }
}

