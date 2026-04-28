<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Users extends BaseController
{
    protected $users;
    protected $db;

    public function __construct()
{
    // Gunakan backslash (\) di depan App untuk memanggil path absolut
    $this->users = new \App\Models\UsersModel();
    $this->db = \Config\Database::connect();
}

    // ================= INDEX =================
    public function index()
    {
        $builder = $this->db->table('users');

        $builder->select('
            users.*,
            COUNT(peminjaman.id_peminjaman) as total_pinjam
        ');

        $builder->join(
            'peminjaman',
            'peminjaman.id_anggota = users.id',
            'left'
        );

        $builder->groupBy('users.id');

        $data['users'] = $builder->get()->getResultArray();

        return view('users/index', $data);
    }

    // ================= CREATE =================
    public function create()
    {
        return view('users/create');
    }

    // ================= STORE =================
    public function store()
    {
        $foto = $this->request->getFile('foto');
        $namaFoto = null;

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/users', $namaFoto);
        }

        $this->users->save([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'),
            'foto' => $namaFoto
        ]);

        return redirect()->to('/users');
    }

    // ================= EDIT =================
    public function edit($id = null)
    {
        if ($id === null) {
            return redirect()->to('/users');
        }

        $data['user'] = $this->users->find($id);

        if (!$data['user']) {
            return redirect()->to('/users')->with('error', 'Data tidak ditemukan');
        }

        return view('users/edit', $data);
    }

    // ================= UPDATE =================
    public function update($id)
    {
        $user = $this->users->find($id);

        $foto = $this->request->getFile('foto');
        $namaFoto = $user['foto'];

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {

            if (!empty($user['foto']) && file_exists(FCPATH . 'uploads/users/' . $user['foto'])) {
                unlink(FCPATH . 'uploads/users/' . $user['foto']);
            }

            $namaFoto = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/users', $namaFoto);
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'role' => $this->request->getPost('role'),
            'foto' => $namaFoto
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->users->update($id, $data);

        return redirect()->to('/users');
    }

    // ================= DELETE =================
    public function delete($id)
    {
        $user = $this->users->find($id);

        if ($user && !empty($user['foto']) && file_exists(FCPATH . 'uploads/users/' . $user['foto'])) {
            unlink(FCPATH . 'uploads/users/' . $user['foto']);
        }

        $this->users->delete($id);

        return redirect()->to('/users');
    }

    // ================= DETAIL =================
    public function detail($id)
    {
        $data['user'] = $this->users->find($id);

        if (!$data['user']) {
            return redirect()->to('/users')->with('error', 'Data tidak ditemukan');
        }

        return view('users/detail', $data);
    }

    // ================= PRINT =================
    public function print()
    {
        $keyword = $this->request->getGet('keyword');
        $role = $this->request->getGet('role');

        $builder = $this->db->table('users');

        if ($keyword) {
            $builder->like('nama', $keyword);
        }

        if ($role) {
            $builder->where('role', $role);
        }

        $data['users'] = $builder->get()->getResultArray();

        return view('users/print', $data);
    }

    // ================= WHATSAPP =================
    public function wa($id)
    {
        $user = $this->users->find($id);

        if (!$user) {
            return redirect()->to('/users')->with('error', 'Data tidak ditemukan');
        }

        $pesan = "DATA USER\n\n";
        $pesan .= "Nama: {$user['nama']}\n";
        $pesan .= "Email: {$user['email']}\n";
        $pesan .= "Username: {$user['username']}\n";
        $pesan .= "Role: {$user['role']}\n";

        $url = "https://wa.me/6285175017991?text=" . urlencode($pesan);

        return redirect()->to($url);
    }
    
}