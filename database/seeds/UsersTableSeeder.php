<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

      User::create([
      	'username' => 'admin',
      	'email' => 'admin@mail.com',
      	'password' => Hash::make('password')
      ]);

      factory(App\User::class, 50)->create();
    }
}
