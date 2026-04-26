<?php

namespace App\Controllers;

use Config\Database;

class Penarikan extends BaseController
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
        $data['penarikan'] = $this->db->table('penarikan')
            ->get()
            ->getResultArray();

        return view('penarikan/index', $data);
    }

    // =====================
    // FORM TAMBAH
    // =====================
    public function create()
    {
        $data['peminjaman'] = $this->db->table('peminjaman')->get()->getResultArray();
        $data['petugas'] = $this->db->table('petugas')->get()->getResultArray();

        return view('penarikan/create', $data);
    }

    // =====================
    // SIMPAN
    // =====================
    public function store()
    {
        $this->db->table('penarikan')->insert([
            'id_peminjaman' => $this->request->getPost('id_peminjaman'),
            'alamat'        => $this->request->getPost('alamat'),
            'biaya'         => $this->request->getPost('biaya'),
            'status'        => $this->request->getPost('status'),
            'tanggal_ambil' => $this->request->getPost('tanggal_ambil'),
            'petugas_id'    => $this->request->getPost('petugas_id'),
        ]);

        return redirect()->to('/penarikan');
    }

    // =====================
    // EDIT
    // =====================
    public function edit($id)
    {
        $data['penarikan'] = $this->db->table('penarikan')
            ->where('id_penarikan', $id)
            ->get()
            ->getRowArray();

        return view('penarikan/edit', $data);
    }

    // =====================
    // UPDATE
    // =====================
    public function update($id)
    {
        $this->db->table('penarikan')
            ->where('id_penarikan', $id)
            ->update([
                'id_peminjaman' => $this->request->getPost('id_peminjaman'),
                'alamat'        => $this->request->getPost('alamat'),
                'biaya'         => $this->request->getPost('biaya'),
                'status'        => $this->request->getPost('status'),
                'tanggal_ambil' => $this->request->getPost('tanggal_ambil'),
                'petugas_id'    => $this->request->getPost('petugas_id'),
            ]);

        return redirect()->to('/penarikan');
    }

    // =====================
    // DELETE
    // =====================
    public function delete($id)
    {
        $this->db->table('penarikan')
            ->where('id_penarikan', $id)
            ->delete();

        return redirect()->to('/penarikan');
    }
}