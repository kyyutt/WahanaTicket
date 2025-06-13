<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $role = session()->get('role');
        if (!$role) {
            return redirect()->to('/auth');
        }

        if ($role === 'admin') {
            return redirect()->to('/admin');
        } elseif ($role === 'kasir') {
            return redirect()->to('/kasir');
        }

        return redirect()->to('/auth'); // fallback
    }
}
