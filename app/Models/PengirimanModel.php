<?php

namespace App\Models;

use CodeIgniter\Model;

class PengirimanModel extends Model
{
    protected $table = 'pengiriman';
    protected $primaryKey = 'id_pengiriman';

    protected $allowedFields = [
        'id_anggota',
        'id_buku',
        'alamat',
        'biaya',
        'status',
        'tanggal',
        'id_petugas'
    ];

    protected $useTimestamps = false;
}