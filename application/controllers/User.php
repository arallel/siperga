<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel', 'user');
    }
    public function index()
    {
        $data = $this->user->getData();
        $this->load->view('user/table-user', ['data' => $data]);
    }
    public function tambah()
    {
        $this->load->view('user/tambah-user');
    }
    public function insert()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');

        $data = [
            'nama_lengkap' => $nama,
            'username' => $username,
            'password' => md5($pass),
        ];

        $this->user->insertData($data);
    }
    public function edit($id)
    {
        $data = $this->user->getData($id);
        $this->load->view('user/edit-user', [
            'data' => $data[0]
        ]);
    }

    public function update($id)
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');

        $data = [
            'nama_lengkap' => $nama,
            'username' => $username,
        ];

        $this->user->updateData($data, $id);
    }
    public function delete($id)
    {
        $this->user->deleteData($id);
    }
}
