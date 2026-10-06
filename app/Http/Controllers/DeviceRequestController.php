<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeviceRequestKeyRequest;
use App\Models\Sensor;

class DeviceRequestController extends Controller
{
    public function create(Sensor $sensor)
    {
        abort_unless(auth()->user()?->isAdmin(), 403);

        return view('device-requests.create', compact('sensor'));
    }

    public function store(StoreDeviceRequestKeyRequest $request, Sensor $sensor)
    {
        abort_unless(auth()->user()?->isAdmin(), 403);

        $sensor->deviceRequests()->create($request->validated());

        return to_route('admin.sensors.show', $sensor->id)
            ->with('success', 'تم إضافة مفتاح الطلب بنجاح');
    }
}

