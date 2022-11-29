<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeModel extends CI_Model
{
    public function login($data)
    {
        $cek = $this->db->get_where('user', ['username' => $data['username'], 'password' => $data['password']]);
        if($cek->num_rows() > 0){
            $user = $cek->result_array();
            $sess = [
                'nama' => $user[0]['nama_lengkap'],
                'id' => $user[0]['id_user'],
                'login' => true
            ];
            $this->session->set_userdata($sess);
            redirect('home');
        }else{
            $this->session->set_flashdata('gagal', '<b>Username</b> atau <b>Password</b> and salah');
            redirect('home');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

    public function getCBook()
    {
        return $this->db->get('buku_induk')->num_rows();
    }

    public function getCUser()
    {
        return $this->db->get('user')->num_rows();
    }

    public function getCPinjam()
    {
        return $this->db->get('peminjaman')->num_rows();
    }
}