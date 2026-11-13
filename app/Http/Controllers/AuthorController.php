<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthorController extends Controller
{
    public function index()
    {
        return view('penulis.index', [
            'daftarPenulis' => Author::orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('penulis.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->aturan(), $this->pesan());

        Author::create($validated);

        return redirect()->route('penulis.index')
            ->with('success', 'Penulis berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        return view('penulis.edit', [
            'penulis' => Author::findOrFail($id),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $penulis = Author::findOrFail($id);

        $validated = $request->validate($this->aturan($penulis->id), $this->pesan());

        $penulis->update($validated);

        return redirect()->route('penulis.index')
            ->with('success', 'Penulis berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $penulis = Author::findOrFail($id);

        if ($penulis->books()->exists()) {
            return redirect()->route('penulis.index')
                ->with('error', 'Penulis "' . $penulis->name . '" masih dipakai oleh buku, jadi tidak bisa dihapus.');
        }

        $penulis->delete();

        return redirect()->route('penulis.index')
            ->with('success', 'Penulis berhasil dihapus.');
    }

    private function aturan(?int $abaikanId = null): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('authors', 'name')->ignore($abaikanId),
            ],
            'country' => 'nullable|string|max:100',
        ];
    }

    private function pesan(): array
    {
        return [
            'name.required' => 'Nama penulis wajib diisi.',
            'name.max' => 'Nama penulis maksimal 100 karakter.',
            'name.unique' => 'Nama penulis sudah terdaftar.',
            'country.max' => 'Negara maksimal 100 karakter.',
        ];
    }
}