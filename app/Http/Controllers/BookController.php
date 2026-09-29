<?php

namespace App\Http\Controllers;

class BookController extends Controller
{
    private array $daftarBuku = [
        1 => ['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'harga' => 85000],
        2 => ['judul' => 'Bumi Manusia', 'penulis' => 'Pramoedya Ananta Toer', 'harga' => 72000],
        3 => ['judul' => 'Cantik Itu Luka', 'penulis' => 'Eka Kurniawan', 'harga' => 95000],
    ];

    public function index()
    {
        return view('buku.index', ['daftarBuku' => $this->daftarBuku]);
    }

    public function show($id)
    {
        $buku = $this->daftarBuku[$id] ?? null;
        return view('buku.show', ['buku' => $buku, 'id' => $id]);
    }
}