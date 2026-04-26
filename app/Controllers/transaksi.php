<?php

namespace App\Controllers;

use Config\Database;

class Transaksi extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // =====================
    // LIST DATA
    // =====================
    public function index()
    {
        $data['transaksi'] = $this->db->table('transaksi')
            ->get()
            ->getResultArray();

        return view('transaksi/index', $data);
    }

    // =====================
    // FORM TAMBAH
    // =====================
    public function create()
    {
        $data['peminjaman'] = $this->db->table('peminjaman')->get()->getResultArray();

        return view('transaksi/create', $data);
    }

    // =====================
    // SIMPAN
    // =====================
    public function store()
    {
        $this->db->table('transaksi')->insert([
            'id_peminjaman' => $this->request->getPost('id_peminjaman'),
            'jenis'         => $this->request->getPost('jenis'),
            'jumlah'        => $this->request->getPost('jumlah'),
            'status'        => $this->request->getPost('status'),
            'tanggal'       => $this->request->getPost('tanggal'),
        ]);

        return redirect()->to('/transaksi');
    }

    // =====================
    // EDIT
    // =====================
    public function edit($id)
    {
        $data['transaksi'] = $this->db->table('transaksi')
            ->where('id_transaksi', $id)
            ->get()
            ->getRowArray();

        return view('transaksi/edit', $data);
    }

    // =====================
    // UPDATE
    // =====================
    public function update($id)
    {
        $this->db->table('transaksi')
            ->where('id_transaksi', $id)
            ->update([
                'id_peminjaman' => $this->request->getPost('id_peminjaman'),
                'jenis'         => $this->request->getPost('jenis'),
                'jumlah'        => $this->request->getPost('jumlah'),
                'status'        => $this->request->getPost('status'),
                'tanggal'       => $this->request->getPost('tanggal'),
            ]);

        return redirect()->to('/transaksi');
    }

    // =====================
    // DELETE
    // =====================
    public function delete($id)
    {
        $this->db->table('transaksi')
            ->where('id_transaksi', $id)
            ->delete();

        return redirect()->to('/transaksi');
    }
}