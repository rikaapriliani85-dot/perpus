<?php

namespace App\Controllers;

use App\Models\RakBukuModel;

class RakBuku extends BaseController
{
    public function index()
    {
        $model = new RakBukuModel();
        $data['rak'] = $model->findAll();

        return view('rak/index', $data);
    }

    public function create()
    {
        return view('rak/create');
    }

    public function store()
    {
        $model = new RakBukuModel();

        $model->insert([
            'nama_rak' => $this->request->getPost('nama_rak'),
            'lokasi'   => $this->request->getPost('lokasi')
        ]);

        return redirect()->to(base_url('rak'));
    }

    public function hapus($id)
    {
        $model = new RakBukuModel();
        $model->delete($id);

        return redirect()->to('/rak');
    }
}