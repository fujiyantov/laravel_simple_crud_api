<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => [
                'required',
                'string',
                'max:100',
            ],
            'last_name' => [
                'string',
                'max:100'
            ],
            'date_of_birth' => [
                'date_format:Y-m-d'
            ],
            'phone_number' => [
                'required',
                'numeric',
                'digits_between:11,13'
            ],
            'email' => [
                'required',
                'email',
                'string'
            ],
            'province_id' => [
                'numeric'
            ],
            'city_id' => [
                'numeric'
            ],
            'street' => [
                'string'
            ],
            'zip_code' => [
                'numeric'
            ],
            'ktp_number' => [
                'required',
                'numeric'
            ],
            'ktp_file' => [
                'required',
                'file',
                'image'
            ],
            'position_id' => [
                // 'required',
                'numeric'
            ],
            'bank_id' => [
                // 'required',
                'numeric'
            ],
            'account_number' => [
                'numeric'
            ],
        ];
    }
}
