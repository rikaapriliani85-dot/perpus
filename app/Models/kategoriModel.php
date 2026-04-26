<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    protected $allowedFields = ['nama_kategori'];
    
}
use App\Models\KategoriModel;

public function index()
{
    $model = new KategoriModel();
    $data['kategori'] = $model->findAll();

    return view('kategori/index', $data);
}