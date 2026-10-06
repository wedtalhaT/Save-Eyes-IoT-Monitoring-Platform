<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeviceRequest;
use App\Models\Sensor;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = auth()->user()->devices()
            ->withCount('sensors')
            ->get();

        return view('devices.index', compact('devices'));
    }

    public function create()
    {
        $sensors = Sensor::all();

        return view('devices.create', compact('sensors'));
    }

    public function store(StoreDeviceRequest $request)
    {
        $validated = $request->validated();

        $device = auth()->user()->devices()->create([
            'name' => $validated['name'],
        ]);

        $sensorIds = $validated['sensor_ids'] ?? [];
        if (! array_is_list($sensorIds)) {
            $sensorIds = array_keys($sensorIds);
        }

        $sensorIds = Sensor::query()
            ->whereIn('id', $sensorIds)
            ->pluck('id')
            ->all();

        $device->sensors()->sync($sensorIds);

        return to_route('devices.show', $device->uuid)
            ->with('success', 'تم إضافة الجهاز بنجاح');
    }

    public function show($device)
    {
        $device = auth()->user()->devices()
            ->where('uuid', $device)
            ->with(['sensors.deviceRequests'])
            ->firstOrFail();

        return view('devices.show', compact('device'));
    }

    public function destroy($device)
    {
        auth()->user()->devices()->findOrFail($device)->delete();

        return to_route('devices.index')
            ->with('success', 'تم حذف الجهاز بنجاح');
    }
}

