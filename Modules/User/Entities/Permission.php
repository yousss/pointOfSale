<?php

namespace Modules\User\Entities;

use Zizaco\Entrust\EntrustPermission;

use Illuminate\Database\Eloquent\Model;

class Permission extends EntrustPermission
{
    protected $fillable = ['id', 'name', 'display_name'];
}
