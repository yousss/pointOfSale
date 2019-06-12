<?php
namespace Modules\User\Database\factories;
/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        ['name' => 'admin',
        'display_name' => 'administrator',
        'description' => 'admin is allowed to manage and edit other users'
        ],
        [
        'name' => 'cashier',
        'display_name' => 'cashier',
        'description' => 'cashier can only post products and insert them into inventories'
        ],
        [
            'name' => 'owner',
            'display_name' => 'shop owner',
            'description' => 'shop owner can see any reports of inventories availability, revenues, staffing'
        ],
        
    ];
});
