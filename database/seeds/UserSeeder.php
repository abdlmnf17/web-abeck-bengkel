<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=User::create([
            'name'=> 'admin',
            'email'=>'admin@ajm.com',
            'password'=>bcrypt('abeck2024')
            ]);
            $admin->assignRole('admin');

            $user=User::create([
            'name'=> 'user',
            'email'=>'user@test.com',
            'password'=>bcrypt('password')
            ]);
            $admin->assignRole('user');
            
    }
}
