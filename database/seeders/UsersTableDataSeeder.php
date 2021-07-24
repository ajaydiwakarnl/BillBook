<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
	        'name' => "Rajender",
	        'email' => 'admin@gmail.com',
	        'password' => Hash::make('123456')
	    ]);
    }
}