<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() {
        $kategori = Kategori::all();
        return view('backend.kategori.index', compact('kategori'));
    }

    public function create() {
        return view('backend.kategori.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        try {
            Kategori::create([
                'nama_kategori' => $request->nama_kategori
            ]);
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menambahkan kategori: ' . $e->getMessage());
        }
    }

    public function show($id) {
        $kategori = Kategori::findOrFail($id);
        return view('backend.kategori.show', compact('kategori'));
    }

    public function edit($id) {
        $kategori = Kategori::findOrFail($id);
        return view('backend.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        try {
            $kategori = Kategori::findOrFail($id);
            $kategori->update([
                'nama_kategori' => $request->nama_kategori
            ]);
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui kategori: ' . $e->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $kategori = Kategori::findOrFail($id);
            $kategori->delete();
            return back()->with('success', 'Kategori berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus kategori: ' . $e->getMessage());
        }
    }
}
