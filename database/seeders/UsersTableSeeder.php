<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user1 = User::create([
        	'name'=>'Santiago Argilla',
        	'email'=>'sargilla@gmail.com',
        	'password'=>'$2y$10$zsy6ncNm0Qwwa45A1IH/gebY.bDcGWVCX0hs3aSmdQXEjKQIJzTfO',
            'settings' => '{}',
            'activated' => 1
        ]);

        $user2 = User::create([
            'name'=>'Mario Figge',
            'email'=>'mario@3tristestigres.com',
            'password'=>'$2y$10$algl8btSSqnaP1uDSFJIG.AExBWpsWVUB63LWU2iZyyLhWrhHRp/O',
            'settings' => '{}',
            'activated' => 1
        ]);

        $user3 = User::create([
            'name' => 'Hernan Cefarelli',
            'email' => 'hernancefarelli@gmail.com',
            'password' => '$2y$10$fGLPAOpBKT2Oy.ZDEW3CPOiGJ/gLbCxR/W46TUraOSEigZYTCi0Sq',
            'settings' => '{}',
            'activated' => 1
        ]);
        $user4 = User::create([
            'name' => 'David Zisele',
            'email' => 'davidzisele2016@gmail.com',
            'password' => '$2y$10$PsOwvS4XtqnVdio.PAaWLekAjX151kX9hUHLIgqf/CzxFsZKSBcUW',
            'settings' => '{}',
            'activated' => 1
        ]);

        $user1->assignRole('Administrador');
        $user2->assignRole('Administrador');
        $user3->assignRole('Administrador');
        $user4->assignRole('Administrador');

    }
}
