<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    protected $anggotaModel;

    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
    }

    public function index()
    {
        $data['anggota'] = $this->anggotaModel->findAll();
        return view('anggota/index', $data);
    }

    public function create()
    {
        return view('anggota/create');
    }

    public function store()
    {
        $this->anggotaModel->save([
            'nama_anggota' => $this->request->getPost('nama_anggota'),
            'alamat'       => $this->request->getPost('alamat'),
            'no_hp'        => $this->request->getPost('no_hp'),
        ]);

        return redirect()->to('/anggota');
    }

    public function edit($id)
    {
        $data['anggota'] = $this->anggotaModel->find($id);

        if (!$data['anggota']) {
            return redirect()->to('/anggota');
        }

        return view('anggota/edit', $data);
    }

    public function update($id)
    {
        $this->anggotaModel->update($id, [
            'nama_anggota' => $this->request->getPost('nama_anggota'),
            'alamat'       => $this->request->getPost('alamat'),
            'no_hp'        => $this->request->getPost('no_hp'),
        ]);

        return redirect()->to('/anggota');
    }

    public function delete($id)
    {
        $this->anggotaModel->delete($id);
        return redirect()->to('/anggota');
    }
    public function peminjaman()
{
    $id = session()->get('id_anggota');

    $data['peminjaman'] = $this->db->table('peminjaman')
        ->select('peminjaman.*, buku.judul')
        ->join('buku', 'buku.id_buku = peminjaman.id_buku')
        ->where('peminjaman.id_anggota', $id)
        ->get()
        ->getResultArray();

    return view('anggota/peminjaman', $data);
}
public function pinjam($id_buku)
{
    dd($id_buku);
}
}