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
      User::create([
      	'username' => 'mechtech5',
      	'email' => 'ayush.likhar@outlook.com',
      	'password' => Hash::make('laxyo123'),
      	'created_at' => now(),
      	'updated_at' => now()
      ]);
    }
}
