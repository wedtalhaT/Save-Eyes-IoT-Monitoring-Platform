<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachSensorToDeviceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'device_uuid' => ['required', 'uuid', 'exists:devices,uuid'],
            'sensor_id' => ['required', 'integer', 'exists:sensors,id'],
        ];
    }
}
