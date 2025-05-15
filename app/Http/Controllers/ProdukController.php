<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index() {
        $produk = Produk::with('kategori', 'user')->latest()->get();
        return view('backend.produk.index', compact('produk'));
    }

    public function create() {
        $kategori = Kategori::all();
        return view('backend.produk.create', compact('kategori'));
    }

    public function store(Request $request) {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'kategori_id' => 'required|exists:kategori,id',
            'status' => 'required|in:Tersedia,Terjual',
        ]);

        try {
            // Simpan gambar jika ada
            if ($request->hasFile('gambar')) {
                $fileName = 'gambar_' . date("Ymd_His") . '.' . $request->gambar->getClientOriginalExtension();
                $request->gambar->move(public_path('backend/dist/assets/images/keris'), $fileName);
            } else {
                $fileName = '';
            }

            // Simpan data produk
            Produk::create([
                'user_id' => 3, // Ganti dengan Auth::id() jika login sudah aktif
                'kategori_id' => $request->kategori_id,
                'nama_produk' => $request->nama_produk,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'gambar' => $fileName,
                'status' => $request->status,
            ]);

            return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menambahkan produk: ' . $e->getMessage());
        }
    }

    public function show($id) {
        $produk = Produk::with('kategori', 'user')->findOrFail($id);
        return view('backend.produk.show', compact('produk'));
    }
    public function edit($id) {
    $produk = Produk::findOrFail($id);
    $kategori = Kategori::all();
    return view('backend.produk.edit', compact('produk', 'kategori'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'kategori_id' => 'required|exists:kategori,id',
            'status' => 'required|in:Tersedia,Terjual',
        ]);
    
        try {
            $produk = Produk::findOrFail($id);
    
            if ($request->hasFile('gambar')) {
                $fileName = 'gambar_' . date("Ymd_His") . '.' . $request->gambar->getClientOriginalExtension();
                $request->gambar->move(public_path('backend/dist/assets/images/keris'), $fileName);
                $produk->gambar = $fileName;
            }
    
            $produk->update([
                'kategori_id' => $request->kategori_id,
                'nama_produk' => $request->nama_produk,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'status' => $request->status,
            ]);
    
            $produk->save();
    
            return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui produk: ' . $e->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $produk = Produk::findOrFail($id);
        
            // Hapus file gambar jika ada
            if ($produk->gambar && file_exists(public_path('backend/dist/assets/images/keris/' . $produk->gambar))) {
                unlink(public_path('backend/dist/assets/images/keris/' . $produk->gambar));
            }
        
            // Hapus data produk
            $produk->delete();
        
            return back()->with('success', 'Produk berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    }


}
