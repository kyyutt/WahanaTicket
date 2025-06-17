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
        $builder = $this->db->table('sales s');
        $builder->select('
            s.*, 
            s.user_name AS kasir_name, 
            t.name AS ticket_name, 
            t.price AS ticket_price
        ');
        $builder->join('tickets t', 't.id = s.ticket_id', 'left');
        $builder->orderBy('s.created_at', 'DESC');

        $sales = $builder->get()->getResultArray();

        return view('admin/laporan', [
            'title'  => 'Laporan Penjualan',
            'active' => 'laporan',
            'sales'  => $sales,
        ]);
    }
}
