<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\AnggotaModel;

class Buku extends BaseController
{
    protected $buku;
    protected $anggotaModel;
    protected $db;

    public function __construct()
    {
        $this->buku = new BukuModel();
        $this->anggotaModel = new AnggotaModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $builder = $this->db->table('buku');
        $builder->select('buku.*, kategori.nama_kategori, penulis.nama_penulis, penerbit.nama_penerbit, rak.nama_rak, rak.lokasi');

        $builder->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'left');
        $builder->join('penulis', 'penulis.id_penulis = buku.id_penulis', 'left');
        $builder->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit', 'left');
        $builder->join('buku_rak', 'buku_rak.id_buku = buku.id_buku', 'left');
        $builder->join('rak', 'rak.id_rak = buku_rak.id_rak', 'left');

        if ($keyword) {
            $builder->like('buku.judul', $keyword)
                    ->orLike('buku.isbn', $keyword);
        }

        $data['buku'] = $builder->get()->getResultArray();

        return view('buku/index', $data);
    }

    public function anggota()
    {
        $data['anggota'] = $this->anggotaModel->findAll();
        $data['buku'] = $this->buku->findAll();

        return view('anggota/buku', $data);
    }
    public function create()
{
    $data['kategori'] = $this->db->table('kategori')->get()->getResultArray();
    $data['penulis'] = $this->db->table('penulis')->get()->getResultArray();
    $data['penerbit'] = $this->db->table('penerbit')->get()->getResultArray();
    $data['rak'] = $this->db->table('rak')->get()->getResultArray();

    return view('buku/create', $data);
}
public function store()
{
    $id_anggota = $this->request->getPost('id_anggota');
    $id_buku    = $this->request->getPost('id_buku');

    // validasi sederhana
    if (!$id_anggota || !$id_buku) {
        return redirect()->back()->with('error', 'Data tidak lengkap');
    }

    // kalau pilih 1 buku saja, jadikan array
    if (!is_array($id_buku)) {
        $id_buku = [$id_buku];
    }

    // 🔥 1. simpan ke tabel peminjaman
    $this->db->table('peminjaman')->insert([
        'id_anggota'      => $id_anggota,
        'tanggal_pinjam'  => date('Y-m-d'),
        'tanggal_kembali' => date('Y-m-d', strtotime('+7 days')),
        'status'          => 'dipinjam'
    ]);

    $id_peminjaman = $this->db->insertID();

    // 🔥 2. simpan ke detail_peminjaman
    foreach ($id_buku as $buku) {
        $this->db->table('detail_peminjaman')->insert([
            'id_peminjaman' => $id_peminjaman,
            'id_buku'       => $buku
        ]);
    }

    return redirect()->to('/peminjaman')->with('success', 'Peminjaman berhasil');
}
}