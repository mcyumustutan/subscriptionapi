<?php

namespace App\Http\Requests;

use App\Enums\Os;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreDevicesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'uid' => 'required|string|max:255',
            'appId' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'os' => [new Enum(Os::class)],
        ];
    }
}
