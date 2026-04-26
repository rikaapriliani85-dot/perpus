<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';

    protected $allowedFields = [
        'judul',
        'id_kategori',
        'id_penulis',
        'id_penerbit',
        'tahun_terbit',
        'jumlah',
        'tersedia',
        'deskripsi',
        'cover'
    ];


    protected $useTimestamps = false;

    // 🔥 Ambil data buku + relasi lengkap
    public function getBukuLengkap()
    {
        return $this->db->table('buku')
            ->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'left')
            ->join('penulis', 'penulis.id_penulis = buku.id_penulis', 'left')
            ->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit', 'left')
            ->join('rak', 'rak.id_rak = buku.id_rak', 'left')
            ->select('buku.*, kategori.nama_kategori, penulis.nama_penulis, penerbit.nama_penerbit, rak.nama_rak')
            ->get()
            ->getResultArray();
    }
}
