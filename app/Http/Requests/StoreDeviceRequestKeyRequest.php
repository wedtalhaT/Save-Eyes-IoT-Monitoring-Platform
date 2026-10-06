<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDeviceRequestKeyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        return [
            'key' => [
                'required',
                Rule::unique('device_requests', 'key')
                    ->where('sensor_id', $this->route('sensor')->id),
            ],
            'label' => ['required','string','max:255'],
            'unit' => ['nullable','string','max:255'],
        ];
    }
}
