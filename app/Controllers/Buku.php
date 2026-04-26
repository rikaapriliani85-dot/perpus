<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $buku;
    protected $db;

    public function __construct()
    {
        $this->buku = new BukuModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $builder = $this->db->table('buku');
        $builder->select('
            buku.*,
            kategori.nama_kategori,
            penulis.nama_penulis,
            penerbit.nama_penerbit,
            rak.nama_rak,
            rak.lokasi
        ');
        $builder->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'left');
        $builder->join('penulis', 'penulis.id_penulis = buku.id_penulis', 'left');
        $builder->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit', 'left');
        $builder->join('buku_rak', 'buku_rak.id_buku = buku.id_buku', 'left');
        $builder->join('rak', 'rak.id_rak = buku_rak.id_rak', 'left');

        if ($keyword) {
            $builder->like('buku.judul', $keyword);
            $builder->orLike('buku.isbn', $keyword); // Tambahan: bisa cari berdasarkan ISBN juga
        }

        $data['buku'] = $builder->get()->getResultArray();

        return view('buku/index', $data);
    }

    public function create()
    {
        $data['kategori'] = $this->db->table('kategori')->get()->getResultArray();
        $data['penulis'] = $this->db->table('penulis')->get()->getResultArray();
        $data['penerbit'] = $this->db->table('penerbit')->get()->getResultArray();
        $data['rak'] = $this->db->table('rak')->get()->getResultArray();

        return view('buku/create', $data);
    }

    public function store()
    {
        // VALIDASI
        $rules = [
            'judul' => 'required',
            'isbn'  => 'required', // Tambahan validasi ISBN
            'cover' => 'max_size[cover,2048]|ext_in[cover,jpg,jpeg,png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Validasi gagal');
        }

        // AMBIL DATA (Ditambahkan ISBN, JUMLAH, dan TERSEDIA)
        $data = [
            'judul'       => $this->request->getPost('judul'),
            'isbn'        => $this->request->getPost('isbn'), // Tambahan
            'id_kategori' => $this->request->getPost('id_kategori'), // Tambahan agar relasi tersimpan
            'id_penulis'  => $this->request->getPost('id_penulis'),  // Tambahan
            'id_penerbit' => $this->request->getPost('id_penerbit'), // Tambahan
            'tahun_terbit'=> $this->request->getPost('tahun_terbit'), // Tambahan
            'jumlah'      => $this->request->getPost('jumlah'), // Tambahan
            'tersedia'    => $this->request->getPost('jumlah'), // Awal input, tersedia = jumlah stok
        ];

        // HANDLE UPLOAD COVER
        $file = $this->request->getFile('cover');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaFile = $file->getRandomName();
            $file->move('uploads/buku/', $namaFile);
            $data['cover'] = $namaFile;
        }

        // INSERT KE BUKU
        $this->buku->insert($data);
        $id_buku = $this->buku->getInsertID();

        // INSERT KE RELASI RAK
        $this->db->table('buku_rak')->insert([
            'id_buku' => $id_buku,
            'id_rak'  => $this->request->getPost('id_rak')
        ]);

        return redirect()->to('/buku')->with('success', 'Buku berhasil ditambahkan');
    }

    public function detail($id)
    {
        $builder = $this->db->table('buku');
        $builder->select('
            buku.*,
            kategori.nama_kategori,
            penulis.nama_penulis,
            penerbit.nama_penerbit,
            rak.nama_rak,
            rak.lokasi
        ');
        $builder->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'left');
        $builder->join('penulis', 'penulis.id_penulis = buku.id_penulis', 'left');
        $builder->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit', 'left');
        $builder->join('buku_rak', 'buku_rak.id_buku = buku.id_buku', 'left');
        $builder->join('rak', 'rak.id_rak = buku_rak.id_rak', 'left');
        $builder->where('buku.id_buku', $id);

        $data['buku'] = $builder->get()->getRowArray();

        return view('buku/detail', $data);
    }

    public function edit($id)
    {
        // Ambil data buku beserta id_rak nya
        $data['buku'] = $this->db->table('buku')
            ->select('buku.*, buku_rak.id_rak')
            ->join('buku_rak', 'buku_rak.id_buku = buku.id_buku', 'left')
            ->where('buku.id_buku', $id)
            ->get()->getRowArray();

        $data['kategori'] = $this->db->table('kategori')->get()->getResultArray();
        $data['penulis'] = $this->db->table('penulis')->get()->getResultArray();
        $data['penerbit'] = $this->db->table('penerbit')->get()->getResultArray();
        $data['rak'] = $this->db->table('rak')->get()->getResultArray();

        return view('buku/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'judul' => 'required',
            'isbn'  => 'required',
            'cover' => 'max_size[cover,2048]|ext_in[cover,jpg,jpeg,png]'
        ];

      // sementara disable
// if (!$this->validate($rules)) {
//     return redirect()->back()->withInput()->with('error', 'Validasi gagal');
// }

        // AMBIL DATA LENGKAP (Ditambahkan ISBN, JUMLAH, TERSEDIA)
        $data = [
            'judul'       => $this->request->getPost('judul'),
            'isbn'        => $this->request->getPost('isbn'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_penulis'  => $this->request->getPost('id_penulis'),
            'id_penerbit' => $this->request->getPost('id_penerbit'),
            'tahun_terbit'=> $this->request->getPost('tahun_terbit'),
            'jumlah'      => $this->request->getPost('jumlah'),
            'tersedia'    => $this->request->getPost('tersedia'), // Pastikan tersedia juga diupdate
        ];

        $file = $this->request->getFile('cover');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // hapus cover lama
            $buku = $this->buku->find($id);
            if (!empty($buku['cover']) && file_exists('uploads/buku/' . $buku['cover'])) {
                unlink('uploads/buku/' . $buku['cover']);
            }

            // upload baru
            $namaFile = $file->getRandomName();
            $file->move('uploads/buku/', $namaFile);
            $data['cover'] = $namaFile;
        }

        $this->buku->update($id, $data);

        // update relasi rak
        $this->db->table('buku_rak')
            ->where('id_buku', $id)
            ->update([
                'id_rak' => $this->request->getPost('id_rak')
            ]);

        return redirect()->to('/buku')->with('success', 'Buku berhasil diupdate');
    }

    public function delete($id)
    {
        $buku = $this->buku->find($id);

        if ($buku && !empty($buku['cover']) && file_exists('uploads/buku/' . $buku['cover'])) {
            unlink('uploads/buku/' . $buku['cover']);
        }

        // Hapus juga data di tabel buku_rak sebelum hapus buku (jika tidak ada cascade)
        $this->db->table('buku_rak')->where('id_buku', $id)->delete();
        
        $this->buku->delete($id);

        return redirect()->to('/buku');
    }

    public function print()
    {
        $data['buku'] = $this->db->table('buku')
            ->select('buku.*, kategori.nama_kategori, penulis.nama_penulis, penerbit.nama_penerbit')
            ->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'left')
            ->join('penulis', 'penulis.id_penulis = buku.id_penulis', 'left')
            ->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit', 'left')
            ->get()->getResultArray();

        return view('buku/print', $data);
    }

    public function wa($id)
    {
        $buku = $this->detailData($id);

        $pesan = "DATA BUKU\n\n";
        foreach ($buku as $key => $value) {
            $pesan .= strtoupper($key) . ": " . $value . "\n";
        }

        return redirect()->to("https://wa.me/6285175017991?text=" . urlencode($pesan));
    }

    private function detailData($id)
    {
        return $this->db->table('buku')
            ->select('buku.*, kategori.nama_kategori, penulis.nama_penulis, penerbit.nama_penerbit')
            ->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'left')
            ->join('penulis', 'penulis.id_penulis = buku.id_penulis', 'left')
            ->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit', 'left')
            ->where('buku.id_buku', $id)
            ->get()->getRowArray();
    }
}