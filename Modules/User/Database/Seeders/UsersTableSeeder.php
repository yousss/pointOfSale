<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Entities\{User, Permission, Role};

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 4)
           ->create()
           ->each(function ($user) {
                $user->roles()->save(factory(Role::class)->make());
            })
            ;

            factory(Permission::class, 3)
            ->create()
            ->each(function ($permission) {
                $permission->roles()->save(factory(Role::class)->make());
            });
    }
}
