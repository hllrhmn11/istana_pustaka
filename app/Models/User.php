<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'no_wa',
    ];

    protected $hidden = ['password'];

    public function produk() {
        return $this->hasMany(Produk::class);
    }

    public function transaksi() {
        return $this->hasMany(Transaksi::class, 'pembeli_id');
    }
}
