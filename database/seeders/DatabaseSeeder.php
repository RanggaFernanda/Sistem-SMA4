<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed admin user
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // You can change 'password' to the desired admin password
            'role' => 'Administrator',
            'jbtn_pelatih' => null,
            'foto_profil' => null,
            'alamat' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed pembina user
        DB::table('users')->insert([
            'name' => 'Pembina',
            'email' => 'pembina@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // You can change 'password' to the desired pembina password
            'role' => 'Pembina',
            'jbtn_pelatih' => null,
            'foto_profil' => null,
            'alamat' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed siswa user
        DB::table('users')->insert([
            'name' => 'Siswa',
            'email' => 'siswa@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // You can change 'password' to the desired siswa password
            'role' => 'Siswa',
            'jbtn_pelatih' => null,
            'foto_profil' => null,
            'alamat' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}