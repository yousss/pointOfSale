<?php
namespace Modules\User\Database\factories;
/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Modules\User\Entities\Permission::class, function (Faker $faker) {
    return [
        // [ 
            'name' => 'edit_others_posts',
            'display_name' => 'edit_others_posts',
            'description' => 'User is allowed to manage and edit other users'
        // ],
        // [ 
        //     'name' => 'can_add_users',
        //     'display_name' => 'can_add_users',
        //     'description' => 'User is allowed to manage and edit other users'
        // ],
        // [ 
        //     'name' => 'edit_own_posts',
        //     'display_name' => 'edit_own_posts',
        //     'description' => 'User is allowed to manage and edit other users'
        // ]
    ];
});
