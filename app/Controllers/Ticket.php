<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TicketModel;

class Ticket extends BaseController
{
    protected $ticketModel;

    public function __construct()
    {
        $this->ticketModel = new TicketModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Tiket',
            'active' => 'tiket',
            'tickets' => $this->ticketModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/ticket', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ])) {
            return redirect()->to('/admin/ticket')->withInput()->with('validation', $this->validator);
        }

        $this->ticketModel->save([
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
        ]);

        return redirect()->to('/admin/ticket')->with('success', 'Tiket berhasil ditambahkan.');
    }

    public function update($id)
    {
        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->ticketModel->update($id, [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
        ]);

        return redirect()->to('/admin/ticket')->with('success', 'Tiket berhasil diupdate.');
    }


    public function delete($id)
    {
        $this->ticketModel->delete($id);
        return redirect()->to('/admin/ticket')->with('success', 'Tiket berhasil dihapus.');
    }
}
