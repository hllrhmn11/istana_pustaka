<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class ShopController extends Controller
{
    public function index()
    {
        $semuaProduk = Produk::with('user')->whereIn('kategori_id', [1, 2])->get();

        return view('frontend.shop', compact('semuaProduk'));
    }
}

