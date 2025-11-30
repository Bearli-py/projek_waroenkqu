<?php

namespace App\Http\Controllers;

class PageController
{
    public function beranda()
    {
        return view('pages.beranda');
    }

    public function galeri()
    {
        return view('pages.galeri');
    }

    public function menu()
    {
        return view('pages.menu');
    }

    public function testimoni()
    {
        return view('pages.testimoni');
    }

    public function kontak()
    {
        return view('pages.kontak');
    }

    public function tentang()
    {
        return view('pages.tentang');
    }
}