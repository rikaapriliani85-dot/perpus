<?php

namespace App\Controllers;

use Config\Database;

class Pengiriman extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // ================= INDEX =================
    public function index()
    {
        $data['pengiriman'] = $this->db->table('pengiriman')
            ->orderBy('id_pengiriman', 'DESC')
            ->get()
            ->getResultArray();

        return view('pengiriman/index', $data);
    }

    // ================= CREATE =================
    public function create()
    {
        $data['anggota'] = $this->db->table('anggota')->get()->getResultArray();
        $data['buku']    = $this->db->table('buku')->get()->getResultArray();
        $data['petugas'] = $this->db->table('petugas')->get()->getResultArray();

        return view('pengiriman/create', $data);
    }

    // ================= STORE =================
    public function store()
{
   $this->db->table('pengiriman')->insert([
    'id_anggota' => $this->request->getPost('anggota_id'),
    'alamat'     => $this->request->getPost('alamat'),
    'biaya'      => $this->request->getPost('biaya'),
    'status'     => $this->request->getPost('status'),
]);
    return redirect()->to('/pengiriman');
}

    // ================= EDIT =================
    public function edit($id)
    {
        $data['pengiriman'] = $this->db->table('pengiriman')
            ->where('id_pengiriman', $id) // 🔥 FIX
            ->get()
            ->getRowArray();

        $data['anggota'] = $this->db->table('anggota')->get()->getResultArray();
        $data['buku']    = $this->db->table('buku')->get()->getResultArray();
        $data['petugas'] = $this->db->table('petugas')->get()->getResultArray();

        return view('pengiriman/edit', $data);
    }

    // ================= UPDATE =================
    public function update($id)
    {
        $this->db->table('pengiriman')
            ->where('id_pengiriman', $id) // 🔥 FIX
            ->update([
                'id_anggota' => $this->request->getPost('id_anggota'),
                'alamat'     => $this->request->getPost('alamat'),
                'biaya'      => $this->request->getPost('biaya'),
                'status'     => $this->request->getPost('status'),
                'tanggal'    => $this->request->getPost('tanggal'),
                    'petugas_id' => $this->request->getPost('petugas_id'),
            ]);

        return redirect()->to(base_url('pengiriman'));
    }

    // ================= DELETE =================
    public function delete($id)
    {
        $this->db->table('pengiriman')
            ->where('id_pengiriman', $id) // 🔥 FIX
            ->delete();

        return redirect()->to(base_url('pengiriman'));
    }
}