<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        // 1. Buat user Admin
        $admin = User::create([
            'name' => 'Admin Perpustakaan',
            'email' => 'admin@perpustakaan.go.id',
            'usertype' => 'admin',
            'password' => Hash::make('password123'),
            'phone' => '021-5555-1234',
            'address' => 'Jl. Merdeka No. 1, Jakarta Pusat',
        ]);

        // 2. Buat user Petugas (Staff)
        $petugas = User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@perpustakaan.go.id',
            'usertype' => 'staff',
            'password' => Hash::make('password123'),
            'phone' => '021-5555-5678',
            'address' => 'Jl. Sudirman No. 45, Jakarta Selatan',
        ]);

        // 3. Buat user Anggota biasa (5 orang)
        $anggota = User::factory(5)->create([
            'usertype' => 'user',
            'password' => Hash::make('password123'),
        ])->each(function ($user) use ($faker) {
            $user->update([
                'phone' => '08' . $faker->numerify('##########'),
                'address' => $faker->address(),
            ]);
        });

        // 4. Buat Kategori (12 kategori Indonesia)
        $kategoriList = [
            'Fiksi Indonesia',
            'Non-Fiksi',
            'Sains & Teknologi',
            'Sejarah Indonesia',
            'Biografi Tokoh',
            'Pendidikan & Referensi',
            'Agama & Spiritual',
            'Komik & Novel Grafis',
            'Anak-anak & Remaja',
            'Bisnis & Kewirausahaan',
            'Hukum & Peradilan',
            'Kesehatan & Psikologi',
        ];

        foreach ($kategoriList as $namaKategori) {
            Category::create(['cat_title' => $namaKategori]);
        }

        // 5. Buat Buku (40 buku) - menggunakan factory dengan data Indonesia
        Book::factory(40)->create();

        // 6. Buat Data Peminjaman (30 record)
        $bukuIds = Book::pluck('id')->toArray();
        $userIds = User::where('usertype', 'user')->pluck('id')->toArray();
        $statuses = ['Pending', 'Approved', 'Rejected', 'Returned'];

        for ($i = 0; $i < 30; $i++) {
            Borrow::create([
                'book_id' => $faker->randomElement($bukuIds),
                'user_id' => $faker->randomElement($userIds),
                'status' => $faker->randomElement($statuses),
            ]);
        }

        $this->command->info('✅ Database seeding selesai!');
        $this->command->info('   - Admin: admin@perpustakaan.go.id / password123');
        $this->command->info('   - Petugas: budi@perpustakaan.go.id / password123');
        $this->command->info('   - 5 Anggota (password: password123)');
        $this->command->info('   - 12 Kategori');
        $this->command->info('   - 40 Buku');
        $this->command->info('   - 30 Data Peminjaman');
    }
}
