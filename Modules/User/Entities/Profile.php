<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'profile_first_name',
        'profile_last_name',
        'profile_primary_phone',
        'profile_secondary_phone',
        'profile_country_code',
        'profile_street',
        'profile_organization',
        'profile_state',
        'profile_city',
        'profile_postal_code',
        'profile_latitude',
        'profile_longitude',
        'is_primary',
        'is_billing',
        'is_shipping',
        'profile_delete_at'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'profile_user');
    }
}
