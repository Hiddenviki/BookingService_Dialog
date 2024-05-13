<?php

namespace App\Http\Requests;

use App\Rules\LandlordExists;
use App\Rules\TenantExists;
use Illuminate\Foundation\Http\FormRequest;

class DialogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'landlord_id' => ['required', 'int', new LandlordExists()],
            'tenant_id' => ['required', 'int', new TenantExists()],
        ];
    }
}
