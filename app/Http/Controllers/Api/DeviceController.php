<?php

namespace App\Http\Controllers\Api;

use App\Events\DeviceUpdatedEvent;
use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function update(Request $request, string $uuid): JsonResponse
    {
        $device = Device::findOrFail($uuid);

        $device->update([
            'data' => $request->all(),
            'last_seen_at' => now(),
        ]);

        event(new DeviceUpdatedEvent($device->uuid, $device->data ?? []));

        return response()->json(['status' => 'ok']);
    }
}

