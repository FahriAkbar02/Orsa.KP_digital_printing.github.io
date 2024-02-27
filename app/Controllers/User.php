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

    // Di dalam controller atau di tempat lain yang sesuai
    public function index()
    {
        // Ambil objek pengguna yang sedang login
        $user = user();

        // Cek apakah pengguna sedang login
        if ($user) {
            // Ambil email dan username pengguna langsung dari objek pengguna
            $email = $user->email;
            $username = $user->username;

            // Ambil peran (role) pengguna dari tabel auth_groups
            $groupsModel = new \Myth\Auth\Models\GroupModel();
            $groups = $groupsModel->getGroupsForUser($user->id);

            // Inisialisasi array untuk menampung nama peran (role)
            $roles = [];
            // Loop melalui setiap peran pengguna dan tambahkan nama peran ke array roles
            foreach ($groups as $group) {
                // Pastikan $group adalah objek sebelum mengakses properti name
                if (is_object($group)) {
                    $roles[] = $group->name;
                } elseif (is_array($group) && isset($group['name'])) {
                    // Jika $group adalah array, pastikan properti name tersedia sebelum mengaksesnya
                    $roles[] = $group['name'];
                }
            }
            // Tampilkan data pengguna di view
            return view('user/index', [
                'email' => $email,
                'username' => $username,
                'roles' => $roles,
            ]);
        } else {
            // Jika pengguna tidak login, redirect atau lakukan sesuatu yang sesuai
        }
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
        $fullname = $this->request->getPost('fullname');
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
            'fullname' => $fullname,
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
