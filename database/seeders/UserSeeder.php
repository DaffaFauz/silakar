<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Daffa',
            'username' => 'daf',
            'password' => Hash::make('password'),
            'jabatan' => 'staff_keuangan'
        ]);
        User::create([
            'name' => 'Deden',
            'username' => 'den',
            'password' => Hash::make('password'),
            'jabatan' => 'bendahara'
        ]);
        User::create([
            'name' => 'Ahmad',
            'username' => 'mad',
            'password' => Hash::make('password'),
            'jabatan' => 'kepala_puskesmas'
        ]);
    }
}
