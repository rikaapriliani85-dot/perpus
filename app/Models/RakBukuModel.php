<?php

namespace App\Models;

use CodeIgniter\Model;

class RakBukuModel extends Model
{
    protected $table = 'rak_buku';
    protected $primaryKey = 'id_rak';
    protected $allowedFields = ['nama_rak', 'lokasi'];
}
