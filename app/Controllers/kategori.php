<?php

namespace App\Controllers;

use Config\Database;

class Kategori extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // ================= LIST =================
    public function index()
    {
        $data['kategori'] = $this->db
            ->table('kategori')
            ->get()
            ->getResultArray();

        return view('kategori/index', $data);
    }

    // ================= CREATE PAGE =================
    public function create()
    {
        return view('kategori/create');
    }

    // ================= STORE DATA =================
    public function store()
    {
        $this->db->table('kategori')->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()->to(base_url('kategori'))
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    // ================= DELETE =================
    public function delete($id)
    {
        $this->db->table('kategori')
            ->where('id_kategori', $id)
            ->delete();

        return redirect()->to(base_url('kategori'))
            ->with('success', 'Kategori berhasil dihapus');
    }
}