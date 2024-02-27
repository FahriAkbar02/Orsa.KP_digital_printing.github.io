<?php

namespace App\Controllers;


class Admin extends BaseController
{
    protected $db, $builder;
    protected $userData;
    protected $groupId;
    protected $groupData;
    public function __construct()
    {
        $this->db = \Config\Database::connect(); // Perbaikan di sini
        $this->builder = $this->db->table('users'); // Perbaikan di sini

        $this->groupId = $this->db->table('auth_groups');
        $this->groupData = $this->db->table('auth_groups_users');
    }
    public function index()
    {

        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();


        // Query Builders

        $this->builder->select('users.id as userid, username, email, fullname, user_image, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();

        return view('admin/index', $data);
    }

    public function detail($id = 0)
    {
        $this->builder->select('users.id as userid, username, email, fullname, user_image, name, auth_groups_users.group_id');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();


        if (empty($data['user'])) {

            return redirect()->to('admin');
        }
        return view('admin/detail', $data);
    }

    public function delete($id)
    {
        // Periksa jika ID yang valid diterima
        if ($id) {
            // Melakukan penghapusan
            $this->builder->where('id', $id);
            $this->builder->delete();

            // Tambahkan pesan flashdata untuk konfirmasi penghapusan
            session()->setFlashdata('message', 'Pengguna berhasil dihapus');

            // Arahkan kembali ke halaman admin
            return redirect()->to('/admin');
        } else {
            // Arahkan kembali dengan pesan error jika ID tidak valid
            session()->setFlashdata('error', 'Penghapusan gagal. ID tidak valid.');
            return redirect()->to('/admin');
        }
    }
    public function edit($userId)
    {

        // Ambil data user berdasarkan ID
        $userData = $this->db->table('users')->where('id', $userId)->get()->getRow();

        // Cek jika data user tidak ada
        if (!$userData) {
            session()->setFlashdata('error', 'User tidak ditemukan');
            return redirect()->to('/admin');
        }

        // Ambil semua grup
        $groups = $this->db->table('auth_groups')->get()->getResult();

        // Kirim data ke view
        $data = [
            'user' => $userData,
            'groups' => $groups,
            // Data lain yang diperlukan
        ];

        return view('admin/edit', $data);
    }


    public function editUserAndGroup($userId)
    {
        $userData = $this->request->getPost('user');
        $groupId = $this->request->getPost('group_id');

        // Check if the group ID exists in auth_groups
        $groupExists = $this->db->table('auth_groups')->where('id', $groupId)->countAllResults();

        if ($groupExists == 0) {
            // Group ID does not exist, handle the error
            return redirect()->back()->with('error', 'Invalid group ID');
        }

        // Update user data
        $this->db->table('users')->where('id', $userId)->update($userData);

        // Update user-group relationship
        $this->db->table('auth_groups_users')->where('user_id', $userId)->update(['group_id' => $groupId]);

        return redirect()->to('/user')->with('message', 'User and group updated successfully');
    }
}
