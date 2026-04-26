<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;

class Peminjaman extends BaseController
{
    protected $db;
    protected $peminjaman;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->peminjaman = new PeminjamanModel();
    }

    // ================= INDEX =================
    public function index()
    {
        $builder = $this->db->table('peminjaman');

        $builder->select('
            peminjaman.*,
            anggota.username as nama_anggota,
            petugas.username as nama_petugas,
            GROUP_CONCAT(buku.cover) as cover,
            GROUP_CONCAT(buku.judul SEPARATOR "<br>") as judul_buku
        ');

        $builder->join('users as anggota', 'anggota.id = peminjaman.id_anggota', 'left');
        $builder->join('users as petugas', 'petugas.id = peminjaman.id_petugas', 'left');
        $builder->join('detail_peminjaman', 'detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman', 'left');
        $builder->join('buku', 'buku.id_buku = detail_peminjaman.id_buku', 'left');

        $builder->groupBy('peminjaman.id_peminjaman');
        $builder->orderBy('peminjaman.id_peminjaman', 'DESC');

        $data['peminjaman'] = $builder->get()->getResultArray();
        

        // ================= DENDA =================
        $tarif_denda = 1000;
        $today = date('Y-m-d');

        foreach ($data['peminjaman'] as &$p) {

           if ($p['status'] == 'dipinjam' && $p['tanggal_kembali'] != null) {

    $telat = (strtotime(date('Y-m-d')) - strtotime($p['tanggal_kembali'])) / 86400;

    if ($telat > 0) {
        $p['denda'] = $telat * 1000;
    } else {
        $p['denda'] = 0;
    }
}

            // cover pertama saja
            $covers = explode(',', $p['cover'] ?? '');
            $p['cover'] = $covers[0] ?? null;
        }

        return view('peminjaman/index', $data);
    }

    // ================= CREATE =================
    public function create()
    {
        $data['anggota'] = $this->db->table('users')
            ->where('role', 'anggota')
            ->get()->getResultArray();

        $data['buku'] = $this->db->table('buku')
            ->get()->getResultArray();

        return view('peminjaman/create', $data);
    }

    // ================= STORE =================
    public function store()
    {
        $id_anggota = $this->request->getPost('id_anggota');
        $id_petugas = session()->get('id_user');
        $id_buku = $this->request->getPost('id_buku');
        $tanggal_pinjam = $this->request->getPost('tanggal_pinjam');

        if (!$id_petugas) {
            return redirect()->back()->with('error', 'Petugas belum login');
        }

        if (empty($id_buku)) {
            return redirect()->back()->with('error', 'Pilih minimal 1 buku');
        }

        if (!is_array($id_buku)) {
            $id_buku = [$id_buku];
        }
            $id_peminjaman = $this->db->table('peminjaman')->insert([
            'id_anggota' => $id_anggota,
            'id_petugas' => $id_petugas,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => date('Y-m-d', strtotime($tanggal_pinjam . ' +7 days')),
            'status' => 'dipinjam'
        ]);

        $id_peminjaman = $this->db->insertID();
        return redirect()->to('/peminjaman');
    }

    // ================= DETAIL =================
    public function detail($id)
    {
        $data['peminjaman'] = $this->db->table('peminjaman')
            ->select('peminjaman.*,
                      anggota.username as nama_anggota,
                      petugas.username as nama_petugas')
            ->join('users as anggota', 'anggota.id = peminjaman.id_anggota', 'left')
            ->join('users as petugas', 'petugas.id = peminjaman.id_petugas', 'left')
            ->where('peminjaman.id_peminjaman', $id)
            ->get()
            ->getRowArray();

        $data['detail'] = $this->db->table('detail_peminjaman')
            ->select('detail_peminjaman.*, buku.judul, buku.cover')
            ->join('buku', 'buku.id_buku = detail_peminjaman.id_buku', 'left')
            ->where('detail_peminjaman.id_peminjaman', $id)
            ->get()
            ->getResultArray();

        return view('peminjaman/detail', $data);
    }

    // ================= DELETE =================
    public function delete($id)
    {
        $this->db->table('detail_peminjaman')
            ->where('id_peminjaman', $id)
            ->delete();

        $this->db->table('peminjaman')
            ->where('id_peminjaman', $id)
            ->delete();

        return redirect()->to('/peminjaman');
    }
    public function edit($id)
{
    $data['peminjaman'] = $this->db->table('peminjaman')
        ->where('id_peminjaman', $id)
        ->get()
        ->getRowArray();

    $data['anggota'] = $this->db->table('users')
        ->where('role', 'anggota')
        ->get()
        ->getResultArray();

    $data['buku'] = $this->db->table('buku')
        ->get()
        ->getResultArray();

    $data['dipilih'] = $this->db->table('detail_peminjaman')
        ->where('id_peminjaman', $id)
        ->get()
        ->getResultArray();

    return view('peminjaman/edit', $data);
}
public function update($id)
{
    $data = $this->request->getPost();

    // contoh update sederhana
    $this->db->table('peminjaman')->where('id_peminjaman', $id)->update($data);

    return redirect()->to('/peminjaman');
}
}