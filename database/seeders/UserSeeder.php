<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name'     => 'Israel Arbona Guerrero',
            'email'    => 'i.arbona@misena.edu.co',
            'password' => 'adso1516'
        ]);

        User::create([
            'name'     => 'Cesar Guerrero',
            'email'    => 'cesar@misena.edu.co',
            'password' => 'apredizcesar'
        ]);

        User::create([
            'name'     => 'Edilberto Andres Escobar',
            'email'    => 'edilberto@misena.edu.co',
            'password' => 'aprendizedilberto'
        ]);
    }
}
