<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kotamodel extends CI_Model
{
    public function getData()
    {
        return $this->db->get('kota')->result_array();
    }
     public function store($data)
    {
        $qu = $this->db->insert('kota', $data);
        if ($qu) {
            $this->session->set_flashdata('msg', 'Buku Berhasil Ditambahkan');
            redirect('kota');
        }
    }
    public function updatekota($data, $id_kota)
    {
        $qu = $this->db->update('kota', $data, ['id_kota' => $id_kota]);
        if($qu){
            $this->session->set_flashdata('msg', 'buku Berhasil Diubah');
            redirect('kota');
        }
    }
    public function deleteData($id_kota)
    {
        $this->db->delete('kota', ['id_kota' => $id_kota]);
        redirect('kota');
    }
}
?>    