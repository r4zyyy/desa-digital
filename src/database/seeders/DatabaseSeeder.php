<?php

namespace Database\Seeders;

use App\Models\JenisLayanan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $password = config('app.seed_password')
            ?: throw new \RuntimeException('SEED_PASSWORD belum diisi di .env');

        $akun = [
            ['petugas@example.test', 'Petugas Demo', 'petugas', null],
            ['warga1@example.test', 'Warga Fiktif Satu', 'warga', 'SIM-000001'],
            ['warga2@example.test', 'Warga Fiktif Dua', 'warga', 'SIM-000002'],
        ];

        foreach ($akun as [$email, $nama, $role, $kode]) {
            User::firstOrNew(['email' => $email])->forceFill([
                'name' => $nama,
                'role' => $role,
                'kode_warga' => $kode,
                'password' => $password, // otomatis di-hash oleh model User
            ])->save();
        }

        $layanan = JenisLayanan::firstOrCreate(['nama' => 'Surat Keterangan Domisili (Simulasi)']);
        $layanan->persyaratan()->firstOrCreate(['nama' => 'Surat pengantar RT (dummy)']);
    }
}