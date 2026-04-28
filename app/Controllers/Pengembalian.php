<?php

namespace App\Controllers;

use App\Models\PengembalianModel;
use App\Models\PeminjamanModel;

class Pengembalian extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // ================= INDEX =================
   public function index()
{
    $data['pengembalian'] = $this->db->table('pengembalian')
        ->get()
        ->getResultArray();

    return view('pengembalian/index', $data);
}
    // ================= CREATE =================
  public function create()
{
    $data['peminjaman'] = $this->db->table('peminjaman')
        ->get()
        ->getResultArray();

    return view('pengembalian/create', $data);
}
    // ================= STORE =================
    public function store()
{
    $id_peminjaman = $this->request->getPost('id_peminjaman');

    if (!$id_peminjaman) {
        return redirect()->back()->with('error', 'Pilih peminjaman');
    }

    $peminjaman = $this->db->table('peminjaman')
        ->where('id_peminjaman', $id_peminjaman)
        ->get()
        ->getRowArray();

    if (!$peminjaman) {
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }

    $tanggal_dikembalikan = date('Y-m-d');

    $tarif = 1000;
    $denda = 0;

    if ($tanggal_dikembalikan > $peminjaman['tanggal_kembali']) {
        $telat = (strtotime($tanggal_dikembalikan) - strtotime($peminjaman['tanggal_dikembalikan'])) / 86400;
        $denda = $telat * $tarif;
    }

    // 🔥 FIX PENTING: simpan ID peminjaman juga
    $this->db->table('pengembalian')->insert([
        'id_peminjaman' => $id_peminjaman,
        'tanggal_dikembalikan' => $tanggal_dikembalikan,
        'denda' => $denda
    ]);

    // update status
    $this->db->table('peminjaman')
        ->where('id_peminjaman', $id_peminjaman)
        ->update(['status' => 'kembali']);

    return redirect()->to('/pengembalian');
}

    // ================= DETAIL =================
   public function detail($id)
{
    $data['pengembalian'] = $this->db->table('pengembalian')
        ->select('pengembalian.*, peminjaman.tanggal_kembali, peminjaman.id_peminjaman')
        ->join('peminjaman', 'peminjaman.id_peminjaman = pengembalian.id_peminjaman', 'left')
        ->where('pengembalian.id_pengembalian', $id)
        ->get()
        ->getRowArray();

    return view('pengembalian/detail', $data);
}
    // ================= DELETE =================
    public function delete($id)
    {
        $this->db->table('pengembalian')
            ->where('id_pengembalian', $id)
            ->delete();

        return redirect()->to('/pengembalian');
    }
    // ================= HITUNG =================
    public function hitung($id_peminjaman)
{
    $data = $this->db->table('peminjaman')
        ->where('id_peminjaman', $id_peminjaman)
        ->get()
        ->getRowArray();

    if ($data) {

        $denda = 0;

        if (!empty($data['tanggal_dikembalikan'])) {
            $telat = (strtotime(date('Y-m-d')) - strtotime($data['tanggal_dikembalikan'])) / 86400;

            if ($telat > 0) {
                $denda = $telat * 1000;
            }
        }

        $this->db->table('pengembalian')
            ->where('id_peminjaman', $id_peminjaman)
            ->update([
                'denda' => $denda
            ]);
    }

    return redirect()->back();
}
}