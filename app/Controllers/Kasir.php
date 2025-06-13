<?php

namespace App\Controllers;

class Kasir extends BaseController
{
    public function index()
    {
        return view('/kasir/index'); // Wajib sesuai nama file view
    }

    public function transaksi()
    {
        return view('kasir/transaksi');
    }
}
