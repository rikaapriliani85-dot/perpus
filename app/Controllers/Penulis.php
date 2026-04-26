<?php

namespace App\Controllers;

use App\Models\PenulisModel;

class Penulis extends BaseController
{
    public function index()
    {
        $model = new PenulisModel();
        $data['penulis'] = $model->findAll();

        return view('penulis/index', $data);
    }

    public function create()
    {
        return view('penulis/create');
    }

    public function store()
    {
        $model = new PenulisModel();

        $model->save([
            'nama_penulis' => $this->request->getPost('nama_penulis'),
        ]);

        return redirect()->to(base_url('penulis'));
    }

    public function delete($id)
    {
        $model = new PenulisModel();
        $model->delete($id);

        return redirect()->to(base_url('penulis'));
    }
}