<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function store($produk_id) {
        try {
            $produk = Produk::findOrFail($produk_id);

            Transaksi::create([
                'produk_id' => $produk->id,
                'pembeli_id' => Auth::id(),
                'status' => 'dibaca'
            ]);

            $wa = $produk->user->no_wa;
            $pesan = urlencode("Halo, saya tertarik dengan produk *{$produk->nama_produk}* seharga *Rp {$produk->harga}*.");
            return redirect("https://wa.me/{$wa}?text={$pesan}");

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal melakukan transaksi: ' . $e->getMessage());
        }
    }

    public function index() {
        $transaksi = Transaksi::with('produk')->where('pembeli_id', Auth::id())->get();
        return view('transaksi.index', compact('transaksi'));
    }
}

