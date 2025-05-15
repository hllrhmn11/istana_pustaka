<?php

// app/Models/Produk.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model {
    protected $table = 'produk';

    protected $fillable = [
        'user_id', 'kategori_id', 'nama_produk',
        'deskripsi', 'harga', 'gambar', 'status'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }
}

