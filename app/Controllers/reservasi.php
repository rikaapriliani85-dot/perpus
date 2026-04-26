<?php

namespace App\Controllers;

use Config\Database;

class Reservasi extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // =====================
    // INDEX (TAMPIL DATA)
    // =====================
    public function index()
    {
        $data['reservasi'] = $this->db->table('reservasi r')
            ->select('r.*, a.nama_anggota, b.judul')
            ->join('anggota a', 'a.id_anggota = r.id_anggota')
            ->join('buku b', 'b.id_buku = r.id_buku')
            ->get()
            ->getResultArray();

        return view('reservasi/index', $data);
    }

    // =====================
    // FORM CREATE
    // =====================
    public function create()
    {
        $data['anggota'] = $this->db->table('anggota')->get()->getResultArray();
        $data['buku'] = $this->db->table('buku')->get()->getResultArray();

        return view('reservasi/create', $data);
    }

    // =====================
    // STORE
    // =====================
    public function store()
    {
        $this->db->table('reservasi')->insert([
            'id_anggota'        => $this->request->getPost('id_anggota'),
            'id_buku'           => $this->request->getPost('id_buku'),
            'tanggal_reservasi' => $this->request->getPost('tanggal_reservasi'),
            'status'            => $this->request->getPost('status'),
        ]);

        return redirect()->to('/reservasi');
    }

    // =====================
    // EDIT
    // =====================
    public function edit($id)
    {
        $data['reservasi'] = $this->db->table('reservasi')
            ->where('id_reservasi', $id)
            ->get()
            ->getRowArray();

        $data['anggota'] = $this->db->table('anggota')->get()->getResultArray();
        $data['buku'] = $this->db->table('buku')->get()->getResultArray();

        return view('reservasi/edit', $data);
    }

    // =====================
    // UPDATE
    // =====================
    public function update($id)
    {
        $this->db->table('reservasi')
            ->where('id_reservasi', $id)
            ->update([
                'id_anggota'        => $this->request->getPost('id_anggota'),
                'id_buku'           => $this->request->getPost('id_buku'),
                'tanggal_reservasi' => $this->request->getPost('tanggal_reservasi'),
                'status'            => $this->request->getPost('status'),
            ]);

        return redirect()->to('/reservasi');
    }

    // =====================
    // DELETE
    // =====================
    public function delete($id)
    {
        $this->db->table('reservasi')
            ->where('id_reservasi', $id)
            ->delete();

        return redirect()->to('/reservasi');
    }
}