<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'Tantatorn',
            'surname' => 'Suksangwarn',
            'email' => 'tantatorn@siam-u.ac.th ',
            'password' => Hash::make('TimeTime')
        ]);

        DB::table('users')->insert([
            'name' => 'Kittisak',
            'surname' => 'Phormraksa',
            'email' => 'kittisak@siam-u.ac.th',
            'password' => Hash::make('FarmFarm')
        ]);

        DB::table('users')->insert([
            'name' => 'Kiadtisak',
            'surname' => 'Buangam',
            'email' => 'kiadtisak@siam-u.ac.th',
            'password' => Hash::make('GameGame')
        ]);

        DB::table('users')->insert([
            'name' => 'Sorrawat',
            'surname' => 'Wisutthiwan',
            'email' => 'sorrawat@siam-u.ac.th',
            'password' => Hash::make('MangMang')
        ]);
        
        DB::table('users')->insert([
            'name' => 'Phumphathai',
            'surname' => 'Chansriwong',
            'email' => 'phumphathai@saim-u.ac.th',
            'password' => Hash::make('OuOu')
        ]);
    }
}
