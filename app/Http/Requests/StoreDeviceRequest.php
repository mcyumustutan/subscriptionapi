<?php

namespace App\Http\Requests;

use App\Enums\Os;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreDeviceRequest extends FormRequest
{
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
            'language' => [
                'required', 'string', 'max:255',
                Rule::exists('languages', 'code')->where(function ($query) {
                    $query->where('is_active', 1);
                })
            ],
            'os' => [new Enum(Os::class)],
        ];
    }
}
