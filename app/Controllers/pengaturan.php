<?php

namespace App\Controllers;

use App\Models\PengaturanModel;

class Pengaturan extends BaseController
{
    protected $pengaturan;

    public function __construct()
    {
        $this->pengaturan = new PengaturanModel();
    }

    public function index()
    {
        $data['pengaturan'] = $this->pengaturan->first();
        return view('pengaturan/index', $data);
    }

    public function update($id)
    {
        $this->pengaturan->update($id, [
            'nama_aplikasi'   => $this->request->getPost('nama_aplikasi'),
            'denda_per_hari'  => $this->request->getPost('denda_per_hari'),
            'maksimal_pinjam' => $this->request->getPost('maksimal_pinjam'),
            'lama_pinjam'     => $this->request->getPost('lama_pinjam'),
        ]);

        return redirect()->to('/pengaturan');
    }
    public function save()
{
    $data = [
        'nama_aplikasi' => $this->request->getPost('nama_aplikasi'),
        'denda_per_hari' => $this->request->getPost('denda_per_hari'),
        'maksimal_pinjam' => $this->request->getPost('maksimal_pinjam'),
        'lama_pinjam' => $this->request->getPost('lama_pinjam'),
    ];

    $this->pengaturanModel->save($data);

    return redirect()->to('/pengaturan')->with('success', 'Data berhasil disimpan');
}
}