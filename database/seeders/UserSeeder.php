<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i <= 70; $i++) {
            $user = [
                'name'      => "Dede Rand" . $i,
                'email'     => "dede" . $i . "@test.com",
                'password'  => Hash::make("12345678"),
                'status'    => 1,
                'access'    => "user"
            ];

            User::create($user);
        }
    }
}
