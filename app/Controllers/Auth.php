<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        $user  = new UserModel();
        if($user ->countAllResults() == 0) {
            $user->insert([
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role'     => 'admin',
            ]);
        }
        if($user ->countAllResults() == 1) {
            $user->insert([
                'username' => 'kasir',
                'password' => password_hash('kasir123', PASSWORD_DEFAULT),
                'role'     => 'kasir',
            ]);
        }
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
        return view('auth/login');
    }

   public function login()
{
    $userModel = new UserModel();

    if ($this->request->getMethod() === 'post') {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id'        => $user['id'],
                'username'  => $user['username'],
                'role'      => $user['role'],
                'isLoggedIn'=> true,
            ]);

            // Redirect berdasarkan role
            if ($user['role'] === 'admin') {
                return redirect()->to('/admin');
            } elseif ($user['role'] === 'kasir') {
                return redirect()->to('/kasir');
            } else {
                return redirect()->to('/'); // fallback jika role tidak dikenali
            }

        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }
    }

    return redirect()->to('/auth');
}


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth')->with('message', 'You have been logged out successfully.');
    }
}
