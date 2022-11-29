<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kota extends CI_Controller
{
  public function __construct()
    {
        parent::__construct();
        $this->load->model('KotaModel', 'city');
    }
    public function index()
    {
        $data = $this->city->getData();
        $this->load->view('kota/kotaindex', ['data' => $data]);
    }
    public function create()
    {
        $this->load->view('kota/tambahkota');
    }
    public function store()
    {
        $nama_kota = $this->input->post('nama_kota');
        $data = [
           "nama_kota" => $nama_kota,
            
        ];

        $this->city->store($data);
    }
    public function edit($id_kota)
    {
        $data = $this->db->get_where('kota', ["id_kota" => $id_kota])->result_array();
        $this->load->view('kota/editkota', [
            'data' => $data[0]
        ]);
    }
    public function update($id_kota)
    {
       
        $nama_kota = $this->input->post('nama_kota');
        $data = [
           "nama_kota" => $nama_kota,
             
        ];

        $this->city->updatekota($data,$id_kota);
    }
    public function delete($id_kota)
    {
        $this->city->deleteData($id_kota);
    }
}
?>