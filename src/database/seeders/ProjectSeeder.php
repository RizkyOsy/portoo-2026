<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::updateOrCreate(
            ['id' => 1],
            [
                'title' => 'Sistem Catatan Pasien Rumah Sakit Berbasis Website',
                'short_description' => 'Aplikasi berbasis website untuk mencatat, mengelola, dan memantau data pasien rumah sakit secara digital.',
                'description' => 'Sistem Catatan Pasien Rumah Sakit Berbasis Website adalah aplikasi yang dibuat untuk membantu proses pengelolaan data pasien, riwayat kunjungan, jadwal pemeriksaan, dan informasi administrasi pasien. Sistem ini dibangun menggunakan Laravel, Livewire, Blade, Filament V3, dan MariaDB agar data dapat dikelola secara dinamis melalui admin panel.',
                'status' => 'development',
                'progress' => 85,
                'tech_stack' => [
                    'Laravel',
                    'Livewire',
                    'Blade',
                    'Filament V3',
                    'MariaDB',
                    'Docker',
                ],
                'is_featured' => true,
            ]
        );

        Project::updateOrCreate(
            ['id' => 2],
            [
                'title' => 'Sistem Manajemen Tugas',
                'short_description' => 'Aplikasi sederhana untuk mencatat dan memantau status tugas.',
                'description' => 'Sistem Manajemen Tugas adalah aplikasi berbasis website untuk mengelola daftar tugas, status pengerjaan, prioritas, dan progress tugas. Project ini dibuat untuk menerapkan konsep CRUD, validasi form, database relational, dan tampilan frontend yang responsif.',
                'status' => 'done',
                'progress' => 100,
                'tech_stack' => [
                    'Laravel',
                    'Blade',
                    'MariaDB',
                ],
                'is_featured' => true,
            ]
        );

        Project::updateOrCreate(
            ['id' => 3],
            [
                'title' => 'Progress Project Akhir',
                'short_description' => 'Halaman dinamis untuk menampilkan status progress project akhir.',
                'description' => 'Progress Project Akhir adalah fitur yang digunakan untuk menampilkan perkembangan project secara dinamis. Admin dapat mengubah status, progress, deskripsi, dan teknologi yang digunakan melalui admin panel Filament.',
                'status' => 'planning',
                'progress' => 40,
                'tech_stack' => [
                    'Laravel',
                    'Livewire',
                    'Filament V3',
                    'MariaDB',
                ],
                'is_featured' => true,
            ]
        );
    }
}