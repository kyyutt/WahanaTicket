<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Tampilkan daftar user
    public function index()
    {
        $data = [
            'title' => 'User Management',
            'active' => 'user',
            'users' => $this->userModel->findAll(),
        ];

        return view('admin/user', $data);
    }

    // Simpan user baru
    public function store()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role'),
        ];

        $this->userModel->save($data);

        return redirect()->to('/admin/user')->with('success', 'User added successfully.');
    }

    // Update user
    public function update($id)
    {
        $data = [
            'id'       => $id,
            'username' => $this->request->getPost('username'),
            'role'     => $this->request->getPost('role'),
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->userModel->save($data);

        return redirect()->to('/admin/user')->with('success', 'User updated successfully.');
    }

    // Hapus user
    public function delete($id)
    {
        $this->userModel->delete($id);

        return redirect()->to('/admin/user')->with('success', 'User deleted successfully.');
    }
}
