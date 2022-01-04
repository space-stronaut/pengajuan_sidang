<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ronald Abel',
            'email' => 'abelr6099@gmail.com',
            'password' => bcrypt(12345678),
            'nim' => '00902211'
        ]);
    }
}
