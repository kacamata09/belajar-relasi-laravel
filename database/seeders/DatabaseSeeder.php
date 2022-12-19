<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin tertinggi',
            'email' => 'admin@admin.com',
            'jabatan' => 'petugas tertinggi',
            'password' => bcrypt('123')
        ]);
    }
}
