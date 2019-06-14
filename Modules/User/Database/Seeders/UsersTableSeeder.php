<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\{User, Permission, Role};

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 3)->create();
        factory(Role::class)->create([
            'name' => 'owner',
            'display_name' => 'shop owner',
            'description' => 'shop owner can see any reports of inventories availability, revenues, staffing'
        ]);
        factory(Role::class)->create([
            'name' => 'cashier',
        'display_name' => 'cashier',
        'description' => 'cashier can only post products and insert them into inventories'
        ]);
        factory(Role::class)->create([
            'name' => 'admin',
            'display_name' => 'administrator',
            'description' => 'admin is allowed to manage and edit other users'
        ]); 

        factory(Permission::class)->create([ 
            'name' => 'edit_own_posts',
            'display_name' => 'edit_own_posts',
            'description' => 'User is allowed to manage and edit other users'
        ]);

        factory(Permission::class)->create([ 
            'name' => 'can_add_users',
            'display_name' => 'can_add_users',
            'description' => 'User is allowed to manage and edit other users'
        ]);

        factory(Permission::class)->create([ 
            'name' => 'edit_others_posts',
            'display_name' => 'edit_others_posts',
            'description' => 'User is allowed to manage and edit other users'
        ]);

        $roles = Role::all();
        foreach ( $users as $key => $user ) {
            if($user->hasRole('admin') || $user->hasRole('cashier') || $user->hasRole('owner') )
                continue;

            $user->roles()->sync($roles[$key]);


        }
        
        $permissions = Permission::all();
        
        foreach ( $roles as $key => $role ) {
            foreach ($permissions as $key => $permission) {
                if($role->hasPermission($permission))
                    continue;

                $role->attachPermission($permission);
            }
            
        }
    }
}
