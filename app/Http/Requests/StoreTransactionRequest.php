<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            
            'delivery_id' => 'required|exists:App\Models\Delivery,id',
            'device_id' => 'required|exists:App\Models\Device,id',
            'user_id' => 'required|exists:App\Models\User,id',
            'employee_id' => 'required|exists:App\Models\Employee,id',
            'operation_id' => 'required|exists:App\Models\Operation,id',



        ];
    }
}
