<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    public function kirim(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);

        Mail::send('emails.kontak', $data, function($message) use ($data) {
            $message->to('ahmadzuaidi892@gmail.com', 'Istana Pusaka')
                    ->subject('Pesan Kontak dari ' . $data['nama'])
                    ->from($data['email'], $data['nama']);
        });

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}
