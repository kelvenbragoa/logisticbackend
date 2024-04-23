<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeviceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required',
            'make' => 'required',
            'model' => 'required',
            'serial' => 'required',
            'device_availability_id'=>'required|exists:App\Models\DeviceAvailability,id',
            'type_device_id' => 'required|exists:App\Models\TypeDevice,id',
            'device_status_id' => 'required|exists:App\Models\DeviceStatus,id',
        ];
    }
}
