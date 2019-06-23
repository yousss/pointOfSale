<?php

namespace Modules\User\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'profile_id' => $this->profile_id,
            'profile_first_name' => $this->profile_first_name,
            'profile_last_name' => $this->profile_last_name,
            'profile_primary_phone' => $this->profile_primary_phone,
            'profile_secondary_phone' => $this->profile_secondary_phone,
            'profile_country_code' => $this->profile_country_code,
            'profile_street' => $this->profile_street,
            'profile_organization' => $this->profile_organization,
            'profile_state' => $this->profile_state,
            'profile_city' => $this->profile_city,
            'profile_postal_code' => $this->profile_postal_code,
            'profile_latitude' => $this->profile_latitude,
            'profile_longitude' => $this->profile_longitude,
            'is_primary' => $this->is_primary,
            'is_billing' => $this->is_billing,
            'is_shipping' => $this->is_shipping,
            'profile_delete_at' => $this->profile_delete_at,
        ];  
    }
}
