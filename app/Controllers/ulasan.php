<?php

namespace App\Controllers;

use Config\Database;

class Ulasan extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // =========================
    // TAMPIL DATA
    // =========================
    public function index()
    {
        $data['ulasan'] = $this->db->table('ulasan u')
            ->select('u.*, b.judul, a.nama_anggota')
            ->join('buku b', 'b.id_buku = u.id_buku')
            ->join('anggota a', 'a.id_anggota = u.id_anggota')
            ->get()
            ->getResultArray();

        return view('ulasan/index', $data);
    }

    // =========================
    // FORM TAMBAH
    // =========================
    public function create()
    {
        $data['buku'] = $this->db->table('buku')->get()->getResultArray();
        $data['anggota'] = $this->db->table('anggota')->get()->getResultArray();

        return view('ulasan/create', $data);
    }

    // =========================
    // SIMPAN
    // =========================
    public function store()
    {
        $this->db->table('ulasan')->insert([
            'id_buku'    => $this->request->getPost('id_buku'),
            'id_anggota' => $this->request->getPost('id_anggota'),
            'rating'     => $this->request->getPost('rating'),
            'komentar'   => $this->request->getPost('komentar'),
            'tanggal'    => $this->request->getPost('tanggal'),
        ]);

        return redirect()->to('/ulasan');
    }

    // =========================
    // EDIT FORM
    // =========================
    public function edit($id)
    {
        $data['ulasan'] = $this->db->table('ulasan')
            ->where('id_ulasan', $id)
            ->get()
            ->getRowArray();

        $data['buku'] = $this->db->table('buku')->get()->getResultArray();
        $data['anggota'] = $this->db->table('anggota')->get()->getResultArray();

        return view('ulasan/edit', $data);
    }

    // =========================
    // UPDATE
    // =========================
    public function update($id)
    {
        $this->db->table('ulasan')
            ->where('id_ulasan', $id)
            ->update([
                'id_buku'    => $this->request->getPost('id_buku'),
                'id_anggota' => $this->request->getPost('id_anggota'),
                'rating'     => $this->request->getPost('rating'),
                'komentar'   => $this->request->getPost('komentar'),
                'tanggal'    => $this->request->getPost('tanggal'),
            ]);

        return redirect()->to('/ulasan');
    }

    // =========================
    // DELETE
    // =========================
    public function delete($id)
    {
        $this->db->table('ulasan')
            ->where('id_ulasan', $id)
            ->delete();

        return redirect()->to('/ulasan');
    }
}