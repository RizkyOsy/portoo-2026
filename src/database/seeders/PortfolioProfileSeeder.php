<?php

namespace Database\Seeders;

use App\Models\PortfolioProfile;
use Illuminate\Database\Seeder;

class PortfolioProfileSeeder extends Seeder
{
    public function run(): void
    {
        PortfolioProfile::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'name' => 'Rizky',
                'headline' => 'Laravel Web Developer',
                'short_bio' => 'Saya adalah mahasiswa Sistem Informasi yang fokus membangun aplikasi web menggunakan Laravel, Livewire, Blade, Filament, dan MariaDB.',
                'bio' => 'Saya memiliki ketertarikan pada pengembangan website dinamis, sistem informasi, panel admin, dan implementasi database. Portfolio ini dibuat sebagai project UTS Pemrograman Web menggunakan konsep MVC dan modern framework.',

                'email' => 'rizkydental009@gmail.com',
                'phone' => '089509452079',
                'location' => 'Jakarta, Indonesia',
                'github_url' => 'https://github.com/username-kamu',
                'linkedin_url' => 'https://linkedin.com/in/username-kamu',
                'website_url' => null,
                'photo' => null,

                'skills' => [
                    'Laravel',
                    'Livewire',
                    'Blade',
                    'Filament V3',
                    'MariaDB',
                    'Docker',
                ],

                'skill_categories' => [
                    [
                        'icon' => 'BE',
                        'title' => 'Backend',
                        'description' => 'Membangun logic aplikasi, struktur data, autentikasi, relasi database, dan proses bisnis menggunakan Laravel.',
                        'items' => 'Laravel, MVC, Eloquent ORM, Validation, Routing',
                    ],
                    [
                        'icon' => 'FE',
                        'title' => 'Frontend',
                        'description' => 'Membuat tampilan website yang responsif, interaktif, dan mudah digunakan oleh pengguna.',
                        'items' => 'Livewire, Blade, Responsive UI, Custom CSS',
                    ],
                    [
                        'icon' => 'DB',
                        'title' => 'Database',
                        'description' => 'Mengelola database, migration, seeder, relasi tabel, dan query untuk kebutuhan aplikasi dinamis.',
                        'items' => 'MariaDB, Migration, Seeder, Query Builder, Relationship',
                    ],
                    [
                        'icon' => 'TL',
                        'title' => 'Tools',
                        'description' => 'Menggunakan tools development untuk menjalankan, mengelola, dan menyimpan project dengan lebih rapi.',
                        'items' => 'Docker, GitHub, VSCode, Artisan CMD',
                    ],
                ],
            ]
        );
    }
}