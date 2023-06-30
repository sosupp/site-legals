<?php
namespace PySosu\SiteLegals\Tests;

use Orchestra\Testbench\Factories\UserFactory as FactoriesUserFactory;

class UserFactory extends FactoriesUserFactory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => \Illuminate\Support\Str::random(10),
        ];
    }
}

