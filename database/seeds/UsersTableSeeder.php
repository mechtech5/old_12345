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
      User::create([
      	'name' => 'Ayush Likhar',
      	'email' => 'alikhar@laxyo.org',
      	'password' => bcrypt('mechtech5'),
      	'created_at' => now(),
      	'updated_at' => now()
      ]);
    }
}
