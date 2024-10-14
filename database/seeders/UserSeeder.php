<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'name' => 'Nianzjo',
            'email' => 'nianzjo@gmail.com',
            'password' => bcrypt('password'), // Assurez-vous de chiffrer le mot de passe
        ]);
    }
}
