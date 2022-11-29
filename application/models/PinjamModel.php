<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PinjamModel extends CI_Model
{
    public function getData()
    {
      $this->db->select('*');
      $this->db->from('peminjaman');
      $this->db->join('user', 'user.id_user = peminjaman.id_petugas');
      $this->db->join('buku_induk', 'buku_induk.kd_buku = peminjaman.id_buku');
      $this->db->where('status', 1);
      $query = $this->db->get()->result_array();
      return $query;
    }
    public function insertData($data)
    {
        $qu = $this->db->insert('peminjaman', $data);

        
    }
    public function kembalikan($data, $id)
    {
      $this->db->update('peminjaman', $data, ['id_peminjaman' => $id]);
      redirect('peminjaman');
    }
    public function kurangistok($data)
    {
      // kurangi = $this->db->get_where('buku_induk', ['kd_buku' => $data['id_buku']])->result_array();
      // foreach($kurangi as $krg){
      //    $new_stok = [
      //       'stok' => $krg['stok'] - 1
      //    ];
      //    $this->db->update('buku_induk', $new_stok, ['kd_buku' => $data['id_buku']]);
      //    // var_dump($data['id_buku']);
      // }
    }
   //  public function updateData($data, $id)
   //  {
   //      $qu = $this->db->update('user', $data, ['id_user' => $id]);
   //      if($qu){
   //          $this->session->set_flashdata('msg', 'User Berhasil Diubah');
   //          redirect('user');
   //      }
   //  }
    public function deleteData($id)
    {
        $this->db->delete('user', ['id_user' => $id]);
        redirect('user');
    }
}
