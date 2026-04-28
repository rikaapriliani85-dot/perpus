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

   public function prosesPinjam()
{
    // 🔽 INI LETAKNYA
    $id_user = session()->get('id_user');

    if (!$id_user) {
        return redirect()->to('/login');
    }

    $id_buku = $this->request->getPost('id_buku');

    $this->db->table('peminjaman')->insert([
        'id_anggota' => $id_user,
        'tanggal_pinjam' => date('Y-m-d'),
        'tanggal_kembali' => date('Y-m-d', strtotime('+7 days')),
        'status' => 'dipinjam'
    ]);

    $id_peminjaman = $this->db->insertID();

    $this->db->table('detail_peminjaman')->insert([
        'id_peminjaman' => $id_peminjaman,
        'id_buku' => $id_buku
    ]);

    return redirect()->to('/peminjaman/saya');
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
        $builder->join('pengembalian', 'pengembalian.id_peminjaman = peminjaman.id_peminjaman', 'left');

        $builder->groupBy('peminjaman.id_peminjaman');
        $builder->orderBy('peminjaman.id_peminjaman', 'DESC');

        $data['peminjaman'] = $builder->get()->getResultArray();

        // ================= DENDA =================
        foreach ($data['peminjaman'] as &$p) {

            if ($p['status'] == 'dipinjam' && $p['tanggal_dikembalikan'] != null) {

                $telat = (strtotime(date('Y-m-d')) - strtotime($p['tanggal_dikembalikan'])) / 86400;

                if ($telat > 0) {
                    $p['denda'] = $telat * 1000;
                } else {
                    $p['denda'] = 0;
                }
            }

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
        ->get()
        ->getResultArray();

    $data['buku'] = $this->db->table('buku')
        ->get()
        ->getResultArray();

    return view('peminjaman/create', $data);
}
    // ================= STORE =================
   public function store()
{
    $this->db->table('peminjaman')->insert([
        'id_anggota' => $this->request->getPost('id_anggota'),
        'tanggal_pinjam' => date('Y-m-d'),
        'tanggal_kembali' => date('Y-m-d', strtotime('+7 days')),
        'status' => 'dipinjam'
    ]);

    return redirect()->to('/peminjaman');
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

// ================= ANGGOTA =================

 public function peminjamanSaya()
{
    $id_user = session()->get('id_user');

    $data['peminjaman'] = $this->db->table('peminjaman')
        ->select('peminjaman.*, GROUP_CONCAT(buku.judul) as judul_buku')
        ->join('detail_peminjaman', 'detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman')
        ->join('buku', 'buku.id_buku = detail_peminjaman.id_buku')
        ->where('peminjaman.id_anggota', $id_user)
        ->groupBy('peminjaman.id_peminjaman')
        ->orderBy('peminjaman.id_peminjaman', 'DESC')
        ->get()
        ->getResultArray();

    return view('anggota/peminjaman', $data);
}
public function bukuAnggota()
{
    $data['buku'] = $this->db->table('buku')->get()->getResultArray();
    return view('anggota/buku', $data);
}
public function storeAnggota()
{
    $id_user = session()->get('id_anggota');

    $id_buku = $this->request->getPost('id_buku');

    if (!$id_buku) {
        return redirect()->back()->with('error', 'Pilih buku dulu');
    }

    if (!is_array($id_buku)) {
        $id_buku = [$id_buku];
    }

    $this->db->table('peminjaman')->insert([
        'id_anggota' => $id_user,
        'tanggal_pinjam' => date('Y-m-d'),
        'tanggal_dikembalikan' => date('Y-m-d', strtotime('+7 days')),
        'status' => 'dipinjam'
    ]);

    $id_peminjaman = $this->db->insertID();

    foreach ($id_buku as $buku) {
        $this->db->table('detail_peminjaman')->insert([
            'id_peminjaman' => $id_peminjaman,
            'id_buku' => $buku
        ]);
    }

    return redirect()->to('/anggota/peminjaman');
}
public function formPinjam($id_buku)
{
    $data['buku'] = $this->db->table('buku')
        ->select('buku.*, kategori.nama_kategori, penulis.nama_penulis')
        ->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'left')
        ->join('penulis', 'penulis.id_penulis = buku.id_penulis', 'left')
        ->where('buku.id_buku', $id_buku)
        ->get()
        ->getRowArray();

    return view('anggota/form_pinjam', $data);
}
public function pinjam($id_buku)
{
    $db = \Config\Database::connect();

    $data = [
        'id_buku'          => $id_buku,
        'id_anggota'       => session()->get('id_anggota'),
        'tanggal_pinjam'   => date('Y-m-d'),
        'tanggal_dikembalikan'  => date('Y-m-d', strtotime('+7 days')),
        'status'           => 'dipinjam'
    ];

    $db->table('peminjaman')->insert($data);

    return redirect()->back()->with('success', 'Buku berhasil dipinjam');
}
public function detail($id)
{
    $data['peminjaman'] = $this->db->table('peminjaman')
        ->select('peminjaman.*, anggota.username as nama_anggota, petugas.username as nama_petugas')
        ->join('users as anggota', 'anggota.id = peminjaman.id_anggota')
        ->join('users as petugas', 'petugas.id = peminjaman.id_petugas')
        ->where('peminjaman.id_peminjaman', $id)
        ->get()
        ->getRowArray();

    $data['detail'] = $this->db->table('detail_peminjaman')
        ->select('detail_peminjaman.*, buku.judul, buku.cover')
        ->join('buku', 'buku.id_buku = detail_peminjaman.id_buku')
        ->where('detail_peminjaman.id_peminjaman', $id)
        ->get()
        ->getResultArray();

    return view('peminjaman/detail', $data);
}
public function edit($id)
{
    $data['peminjaman'] = $this->db->table('peminjaman')
        ->where('id_peminjaman', $id)
        ->get()
        ->getRowArray();

    if (!$data['peminjaman']) {
        return redirect()->to('/peminjaman')->with('error', 'Data tidak ditemukan');
    }

    $data['anggota'] = $this->db->table('users')
        ->where('role', 'anggota')
        ->get()
        ->getResultArray();

    $data['buku'] = $this->db->table('buku')->get()->getResultArray();

    $data['detail'] = $this->db->table('detail_peminjaman')
        ->where('id_peminjaman', $id)
        ->get()
        ->getResultArray();

    return view('peminjaman/edit', $data);
}
public function update($id)
{
    $id_anggota = $this->request->getPost('id_anggota');
    $id_buku = $this->request->getPost('id_buku');
    $tanggal_pinjam = $this->request->getPost('tanggal_pinjam');

    if (!$id_buku) {
        return redirect()->back()->with('error', 'Pilih buku dulu');
    }

    if (!is_array($id_buku)) {
        $id_buku = [$id_buku];
    }

    // update peminjaman
    $this->db->table('peminjaman')
        ->where('id_peminjaman', $id)
        ->update([
            'id_anggota' => $id_anggota,
            'tanggal_pinjam' => $tanggal_pinjam
        ]);

    // hapus detail lama
    $this->db->table('detail_peminjaman')
        ->where('id_peminjaman', $id)
        ->delete();

    // insert ulang detail (FIX HERE)
    foreach ($id_buku as $buku) {
        $this->db->table('detail_peminjaman')->insert([
            'id_peminjaman' => $id,   // ✔ FIX
            'id_buku' => $buku
        ]);
    }

    return redirect()->to('/peminjaman');
}
public function kembalikan($id_peminjaman)
{
    $db = \Config\Database::connect();

    // Ambil data peminjaman
    $peminjaman = $db->table('peminjaman')
                     ->where('id_peminjaman', $id_peminjaman)
                     ->get()
                     ->getRow();

    $tanggal_kembali = date('Y-m-d');

    // Hitung denda (misal 1000/hari)
    $denda = 0;
    if ($tanggal_dikembalikan > $peminjaman->tanggal_dikembalikan) {
        $selisih = (strtotime($tanggal_dikembalikan) - strtotime($peminjaman->tanggal_dikembalikan)) / (60*60*24);
        $denda = $selisih * 1000;
    }

    // Insert ke tabel pengembalian
    $data = [
        'id_peminjaman'   => $id_peminjaman,
        'tanggal_dikembalikan' => $tanggal_dikembalikan,
        'denda'           => $denda
    ];

    $db->table('pengembalian')->insert($data);

    // Update status peminjaman
    $db->table('peminjaman')
       ->where('id_peminjaman', $id_peminjaman)
       ->update(['status' => 'dikembalikan']);

    return redirect()->back()->with('success', 'Buku berhasil dikembalikan');
}
}