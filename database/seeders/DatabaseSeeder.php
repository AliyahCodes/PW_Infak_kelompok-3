<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Bulan;
use App\Models\Pembayaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'nama_lengkap' => 'admin',
            'email' =>'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        User::create([
            'nis' => 12108772,
            'nama_lengkap' => 'Aliyah',
            'email' =>'aliyah@gmail.com',
            'password' => bcrypt('12108772'),
            'rombel' => 'PPLG XII-4',
            'rayon' => 'Cicurug 7',
            'no_phone_orang_tua' => '089786756543',
            'nominal_perjanjian' => 0,
            'role' => 'user',
        ]);

    }
}
