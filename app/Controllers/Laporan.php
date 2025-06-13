<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Menampilkan laporan penjualan
    public function laporan()
    {
        $builder = $this->db->table('sales');
        $builder->select('sales.*, tickets.name AS ticket_name, tickets.price AS ticket_price, users.username AS kasir_name');
        $builder->join('tickets', 'tickets.id = sales.ticket_id');
        $builder->join('users', 'users.id = sales.user_id');
        $builder->orderBy('sales.created_at', 'DESC');

        $sales = $builder->get()->getResultArray();

        return view('admin/laporan', [
            'title'  => 'Laporan Penjualan',
            'active' => 'laporan',
            'sales'  => $sales,
        ]);
    }
}
