<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * CATATAN: data di bawah ini contoh. Ganti dengan penerbit pilihanmu sendiri
     * (modul meminta data buatan sendiri, minimal 3 penerbit).
     */
    public function run(): void
    {
        Publisher::create(['name' => 'Pustaka Dewata', 'city' => 'Denpasar']);
        Publisher::create(['name' => 'Penerbit Nusa Aksara', 'city' => 'Yogyakarta']);
        Publisher::create(['name' => 'Cahaya Literasi', 'city' => 'Bandung']);
    }
}
