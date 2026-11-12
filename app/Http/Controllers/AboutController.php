<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $title = "About";
        $Nama = "Imtihan Ramadhan";
        $Hoby = "Menulis, Membaca, dan Belajar";
        $Akun = "imtihantio200811 (GitHub)";
        return view('admin.about',
        [
            'title' => $title,
            'Nama' => $Nama,
            'hoby' => $Hoby,
            'Akun' => $Akun
        ]);
    }
}
