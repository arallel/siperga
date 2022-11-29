<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rakmodel extends CI_Model
{
    public function getData()
    {
        return $this->db->get('rak')->result_array();
    }
    
    // public function existData($nama)
    // {
    //     $cek = $this->db->get_where('rak', ['judul' => $nama])->num_rows();
    //     return $cek;
    // }
   
   
     public function store($data)
    {
        $qu = $this->db->insert('rak', $data);
        if ($qu) {
            $this->session->set_flashdata('msg', 'Buku Berhasil Ditambahkan');
            redirect('rak');
        }
    }
   
     public function update($data, $id_rak)
    {
        $qu = $this->db->update('rak', $data, ['id_rak' => $id_rak]);
        if($qu){
            $this->session->set_flashdata('msg', 'buku Berhasil Diubah');
            redirect('rak');
        }
    }
    public function deleteData($id_rak)
    {
        $this->db->delete('rak', ['id_rak' => $id_rak]);
        redirect('rak');
    }
}