<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UserProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => ['required',
                        Rule::unique('users')->ignore($this->id),
                    ],
            'password' => 'required|min:10',
            'profile_first_name' => 'required',
            'profile_last_name' => 'required',
            'profile_primary_phone' => 'required',
            'profile_secondary_phone' => 'nullable',
            'profile_country_code' => 'nullable',
            'profile_street' => 'nullable',
            'profile_organization' => 'nullable',
            'profile_state' => 'nullable',
            'profile_city' => 'nullable',
            'profile_postal_code' => 'nullable',
            'profile_latitude' => 'nullable' ,
            'profile_longitude' => 'nullable',
            'is_primary' => 'boolean',
            'is_billing' => 'boolean',
            'is_shipping' => 'boolean',
            'profile_delete_at' => 'nullable|date',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
