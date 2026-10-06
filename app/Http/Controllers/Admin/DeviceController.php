<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::query()
            ->with(['user'])
            ->withCount('sensors')
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('admin.devices.index', compact('devices'));
    }

    public function show(string $device)
    {
        $device = Device::query()
            ->where('uuid', $device)
            ->with(['user', 'sensors.deviceRequests'])
            ->firstOrFail();

        return view('admin.devices.show', compact('device'));
    }

    public function destroy(Request $request, string $device)
    {
        $device = Device::query()->where('uuid', $device)->firstOrFail();
        $device->delete();

        return to_route('admin.devices.index')->with('success', 'تم حذف الجهاز بنجاح.');
    }
}
