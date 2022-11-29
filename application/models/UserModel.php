<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function getData($id = null)
    {
        if ($id == null) {
            return $this->db->get('user')->result_array();
        } else {
            return $this->db->get_where('user', ['id_user' => $id])->result_array();
        }
    }
    public function insertData($data)
    {
        $qu = $this->db->insert('user', $data);
        if ($qu) {
            $this->session->set_flashdata('msg', 'User Berhasil Ditambahkan');
            redirect('user');
        }
    }
    public function updateData($data, $id)
    {
        $qu = $this->db->update('user', $data, ['id_user' => $id]);
        if($qu){
            $this->session->set_flashdata('msg', 'User Berhasil Diubah');
            redirect('user');
        }
    }
    public function deleteData($id)
    {
        $this->db->delete('user', ['id_user' => $id]);
        redirect('user');
    }
}
