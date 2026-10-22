<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $novel = Category::where('name', 'Novel')->first();
        $pemrograman = Category::where('name', 'Pemrograman')->first();
        $bisnis = Category::where('name', 'Bisnis & Keuangan')->first();

        $data = [
            [$novel, 'Laskar Pelangi', 'Andrea Hirata', 85000],
            [$novel, 'Bumi Manusia', 'Pramoedya Ananta Toer', 72000],
            [$novel, 'Cantik Itu Luka', 'Eka Kurniawan', 95000],
            [$pemrograman, 'Clean Code', 'Robert C. Martin', 250000],
            [$pemrograman, 'The Pragmatic Programmer', 'Andrew Hunt', 230000],
            [$bisnis, 'Rich Dad Poor Dad', 'Robert Kiyosaki', 90000],
            [$bisnis, 'The Psychology of Money', 'Morgan Housel', 99000],
        ];

        foreach ($data as [$kategori, $judul, $penulis, $harga]) {
            Book::create([
                'category_id' => $kategori->id,
                'title' => $judul,
                'author_name' => $penulis,
                'price' => $harga,
            ]);
        }
    }
}