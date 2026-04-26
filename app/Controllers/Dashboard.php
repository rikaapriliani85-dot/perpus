<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function admin()
    {
        if (session()->get('role') != 'admin') {
            return redirect()->to('/dashboard-user');
        }

        return view('dashboard/admin');
    }

    public function user()
    {
        if (session()->get('role') != 'user') {
            return redirect()->to('/dashboard');
        }

        return view('dashboard/user');
    }
    $data['peminjaman'] = $this->db->table('peminjaman')
    ->select('peminjaman.*, anggota.nama as nama_anggota, buku.judul as judul_buku')
    ->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota')
    ->join('buku', 'buku.id_buku = peminjaman.id_buku')
    ->where('peminjaman.status', 'dipinjam')
    ->get()
    ->getResultArray();

return view('layouts/dashboard', $data);
    
}