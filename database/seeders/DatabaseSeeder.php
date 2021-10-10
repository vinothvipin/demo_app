<?php

namespace Database\Seeders;

 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $user = DB::table('users')->where('email' , 'admin@yopmail.com')->first(); 
       if(empty($user)){
             DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@yopmail.com',
            'password' => Hash::make('tech@admin'),
        ]);
       }
        
    }
}
