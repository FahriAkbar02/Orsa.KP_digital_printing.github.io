<?php

namespace App\Controllers;

class User extends BaseController
{
    protected $db, $builder;
    protected $userData;
    protected $groupId;
    protected $groupData;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->groupId = $this->db->table('auth_groups');
        $this->groupData = $this->db->table('auth_groups_users');
    }

    public function index(): string
    {

        $this->builder->select('users.id as userid, username, email, fullname, user_image, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();

        return view('user/index', $data);
    }
    public function editProfile($id)
    {
        // Ambil data user berdasarkan ID
        $userData = $this->db->table('users')->where('id', $id)->get()->getRow();

        // Cek jika data user tidak ada
        if (!$userData) {
            session()->setFlashdata('error', 'User tidak ditemukan');
            return redirect()->to('/user');
        }

        // Kirim data ke view
        $data = [
            'user' => $userData,
            // Data lain yang diperlukan
        ];

        return view('user/edit', $data);
    }

    public function updateProfile($id)
    {
        // Ambil data input dari form
        $userImage = $this->request->getFile('user_image');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');

        // Periksa apakah email yang dimasukkan sudah ada dalam database untuk pengguna lain
        $existingUser = $this->db->table('users')->where('email', $email)->where('id !=', $id)->get()->getRow();

        if ($existingUser) {
            // Jika email sudah ada untuk pengguna lain, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withInput()->with('error', 'Email sudah digunakan oleh pengguna lain');
        }

        // Update data pengguna
        $userData = [
            'username' => $username,
            'email' => $email
        ];

        // Jika ada gambar yang diunggah, simpan dan perbarui nama file gambar pengguna
        if ($userImage && $userImage->isValid() && !$userImage->hasMoved()) {
            $newName = $userImage->getRandomName();
            $userImage->move('./uploads', $newName);
            $userData['user_image'] = $newName;
        }

        $this->db->table('users')->where('id', $id)->update($userData);

        return redirect()->to('/user')->with('message', 'Profil berhasil diperbarui');
    }
}
