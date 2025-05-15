<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman utama dengan produk kategori keris.
     */
    public function index()
    {
        $produkKeris = Produk::where('kategori_id', 1)->get();
        $produkKerisLain = Produk::where('kategori_id', 2)->get(); // Tambahan
        return view('frontend.home', compact('produkKeris', 'produkKerisLain'));

    }
}
