<?php

namespace App\Controllers;

use App\Models\RakModel;

class Rak extends BaseController
{
    protected $rakModel;

    public function __construct()
    {
        $this->rakModel = new RakModel();
    }

    // ✅ READ (Tampilkan semua data + search)
    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $data['rak'] = $this->rakModel
                ->like('nama_rak', $keyword)
                ->orLike('lokasi', $keyword)
                ->findAll();
        } else {
            $data['rak'] = $this->rakModel->findAll();
        }

        return view('rak/index', $data);
    }

    // ✅ CREATE (Form tambah)
    public function create()
    {
        return view('rak/create');
    }

    // ✅ STORE (Simpan data)
    public function store()
    {
        $this->rakModel->save([
            'nama_rak' => $this->request->getPost('nama_rak'),
            'lokasi'   => $this->request->getPost('lokasi'),
        ]);

        return redirect()->to('/rak')->with('success', 'Data rak berhasil ditambahkan');
    }

    // ✅ EDIT (Form edit)
    public function edit($id)
    {
        $data['rak'] = $this->rakModel->find($id);

        return view('rak/edit', $data);
    }

    // ✅ UPDATE (Update data)
    public function update($id)
    {
        $this->rakModel->update($id, [
            'nama_rak' => $this->request->getPost('nama_rak'),
            'lokasi'   => $this->request->getPost('lokasi'),
        ]);

        return redirect()->to('/rak')->with('success', 'Data rak berhasil diupdate');
    }

    // ✅ DELETE (Hapus data)
    public function delete($id)
    {
        $this->rakModel->delete($id);

        return redirect()->to('/rak')->with('success', 'Data rak berhasil dihapus');
    }

    // ✅ DETAIL (Opsional)
    public function detail($id)
    {
        $data['rak'] = $this->rakModel->find($id);

        return view('rak/detail', $data);
    }
}
