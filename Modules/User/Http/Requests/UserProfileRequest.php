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
        $rule = [
            'name' => 'required|min:3',
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
        if ( $this->isMethod('put') ) {
            return $rule;
        }

        return $rule + ['email' => 'required|unique:users'];
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
