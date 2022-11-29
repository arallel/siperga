<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        // $this->load->library('cart');
        $this->load->model('PinjamModel', 'pinjam');
    }
    public function index()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user = peminjaman.id_petugas');
        $this->db->join('buku_induk', 'buku_induk.kd_buku = peminjaman.id_buku');
        $this->db->where('status', 1);
        $data = $this->db->get()->result_array();
        // $data = $this->pinjam->getData();
        $this->load->view('peminjaman/table-peminjaman', ['data' => $data]);
    }
    public function tambah()
    {
        $data = $this->db->get('buku_induk')->result_array();
        $this->load->view('peminjaman/tambah-peminjaman', ['data' => $data]);
    }
    public function submit()
    {
        
        $buku = $this->input->post('buku');
        $siswa = $this->input->post('siswa');
        $petugas = $this->session->id;
        $pinjam = date('d-m-Y', strtotime($this->input->post('tanggal')));
        $batas = date('d-m-Y', strtotime($pinjam . ' + 4 days'));
        // foreach($buku as $buku){
        //     $data = [
        //         'nama_siswa' => $siswa,
        //         'id_petugas' => $petugas,
        //         'id_buku' => $buku,
        //         'tanggal_pinjam' => $pinjam,
        //         'batas_kembali' => $batas,
        //         'status' => 1
        //     ];
        //     $this->pinjam->insertData($data);
        // }
        // $this->session->set_flashdata('msg', 'Peminjaman Berhasil Ditambahkan');
        // redirect('peminjaman');
    }

    public function riwayat()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user = peminjaman.id_petugas');
        $this->db->join('buku_induk', 'buku_induk.kd_buku = peminjaman.id_buku');
        $this->db->where('status', 2);
        $data = $this->db->get()->result_array();
        $this->load->view('peminjaman/table-peminjaman', ['data' => $data]);
    }
    public function kembalikan($id)
    {
        $data = [
            'status' => 2,
        ];
        $this->pinjam->kembalikan($data, $id);
    }
    public function delete($id)
    {
        $this->db->delete('peminjaman', ['id_peminjaman' => $id]);
        redirect('peminjaman/riwayat');
    }
    public function store()
    {
        $data = array(
        'id'      => 'sku_123ABC',
        'qty'     => 1,
        'price'   => 39.95,
        'name'    => 'T-Shirt',
        'coupon'         => 'XMAS-50OFF'
          );

$this->cart->insert($data);
    }
}
