<?php

// app/Models/Transaksi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model {
    protected $table = 'transaksi';

    protected $fillable = ['produk_id', 'pembeli_id', 'tanggal', 'status'];

    public function produk() {
        return $this->belongsTo(Produk::class);
    }

    public function pembeli() {
        return $this->belongsTo(User::class, 'pembeli_id');
    }
}

