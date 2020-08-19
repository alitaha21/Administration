<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use App\User;
use App\Company;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'company_id' => factory(Company::class)->create()->id,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber
    ];
});
