<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TicketModel;
use App\Models\SalesModel;

class Sales extends BaseController
{
    protected $ticketModel;
    protected $salesModel;

    public function __construct()
    {
        $this->ticketModel = new TicketModel();
        $this->salesModel  = new SalesModel();
    }

    // Tampilkan form penjualan
    public function index()
    {
        $data = [
            'title'   => 'Penjualan Tiket',
            'active'  => 'pemesanan',
            'tickets' => $this->ticketModel->findAll(),
        ];

        return view('kasir/sales', $data);
    }

    // Simpan transaksi
    public function store()
    {
        $ticketId = $this->request->getPost('ticket_id');
        $quantity = $this->request->getPost('quantity');
        $userId   = session()->get('user_id');

        $ticket = $this->ticketModel->find($ticketId);

        if (!$ticket || $ticket['stock'] < $quantity) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi atau tiket tidak ditemukan.');
        }

        $totalPrice = $ticket['price'] * $quantity;

        $this->salesModel->save([
            'ticket_id'   => $ticketId,
            'quantity'    => $quantity,
            'total_price' => $totalPrice,
            'user_id'     => $userId,
        ]);

        // Kurangi stok
        $this->ticketModel->update($ticketId, [
            'stock' => $ticket['stock'] - $quantity
        ]);

        return redirect()->to('kasir/sales')->with('success', 'Transaksi berhasil disimpan.');
    }
    public function riwayat()
{
    $userId = session()->get('user_id'); // pastikan pakai 'user_id' sesuai session-mu

    $data = [
        'title'   => 'Riwayat Pemesanan',
        'active'  => 'riwayat',
        'sales'   => $this->salesModel
                        ->select('sales.*, tickets.name AS ticket_name, tickets.price AS ticket_price')
                        ->join('tickets', 'tickets.id = sales.ticket_id')
                        ->where('sales.user_id', $userId)
                        ->orderBy('sales.created_at', 'DESC')
                        ->findAll()
    ];

    return view('kasir/riwayat', $data);
}

public function daftarTiket()
{
    $data = [
        'title'   => 'Daftar Tiket',
        'active'  => 'daftar',
        'tickets' => $this->ticketModel->findAll(),
    ];

    return view('kasir/daftar_tiket', $data);
}

}
