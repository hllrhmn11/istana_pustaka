<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userCount = User::where('role', 'pembeli')->count();
        $nonSellerCount = User::where('role', 'pembeli')->doesntHave('produk')->count();
        $sellerCount = User::where('role', 'pembeli')->has('produk')->count();
        $produkCount = Produk::count();
        $kategoriCount = Kategori::count();
        $nuwUser = User::where('role', 'pembeli')->latest('created_at')->take(5)->get();
        return view('backend.dashboard',[
            'userCount' => $userCount,
            'produkCount' => $produkCount,
            'kategoriCount' => $kategoriCount,
            'sellerCount' => $sellerCount,
            'nuwUser' => $nuwUser,
            'nonSellerCount' => $nonSellerCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
