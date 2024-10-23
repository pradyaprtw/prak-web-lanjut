<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($nama = "", $kelas = "", $foto = "", $ipk = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'foto' => $foto,
            'ipk' => $ipk,
        ];
        return view('profile', $data);
    }
}
