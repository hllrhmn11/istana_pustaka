<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use App\Models\Kategori;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        $produk = Produk::where('nama_produk', 'like', '%' . $query . '%')
            ->orWhere('deskripsi', 'like', '%' . $query . '%')
            ->get();

        $user = User::where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->get();

        $kategori = Kategori::where('nama_kategori', 'like', '%' . $query . '%')->get();

        return view('backend.search.result', compact('query', 'produk', 'user', 'kategori'));
    }
}
