<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukuIndukModel extends CI_Model
{
    public function getData()
    {
        return $this->db->query("SELECT * FROM buku_induk GROUP BY judul,penerbit,pengarang ORDER BY id ASC")->result_array();
    }
     public function getDataexcel()
    {
        return $this->db->get('buku_induk')->result();
    }
    public function existData($nama)
    {
        $cek = $this->db->get_where('buku_induk', ['judul' => $nama])->num_rows();
        return $cek;
    }
    public function detailBuku($id)
    {
        return $this->db->get_where('buku_induk', ['kd_buku' => $id])->result_array();
    }
    public function importExc($data)
    {
        $this->db->insert('buku_induk', $data);
    }
     public function store($data)
    {
        $qu = $this->db->insert('buku_induk', $data);
    }

     public function updatebuku($data, $kd_buku)
    {
        $qu = $this->db->update('buku_induk', $data, ['kd_buku' => $kd_buku]);
        if($qu){
            $this->session->set_flashdata('msg', 'buku Berhasil Diubah');
            redirect('bukuinduk');
        }
    }

    public function tampilkanBuku($id)
    {
        return $this->db->get_where('buku_induk', ['kd_buku' => $id, 'keadaan' => "baik", "stok" => 1])->result_array();
    }
}