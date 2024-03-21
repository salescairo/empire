<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    public function run(): void
    {
        $email = 'admin@empire.com.br';
        User::factory()->create([
            'name' => 'Empire Admin',
            'email' => $email,
            'password' => env('USER_PASSWORD_DEFAULT'),
            'type' => User::MASTER_TYPE,
            'enabled' => true,
        ]);
    }
}
