<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rak extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('rakmodel', 'rak');
    }
     public function index()
     {
     	 $data = $this->rak->getData();
 	  $this->load->view('rak/rakindex', ['data' => $data]);
     }
     public function create()
     {
     	$this->load->view('rak/createrak');
     }
     public function store()
    {
          $nama_rak = $this->input->post('nama_rak');
           
        $data = [
           "nama_rak" => $nama_rak,
            
        ];

        $this->rak->store($data);
    }
    public function edit($id_rak)
    {
        $data = $this->rak->getData($id_rak);
        $this->load->view('rak/editrak', [
            'data' => $data[0]
        ]);
    }
    public function update($id_rak)
    {
          $nama_rak = $this->input->post('nama_rak');
           
        $data = [
           "nama_rak" => $nama_rak,
            
        ];

        $this->rak->update($data,$id_rak);
    }
     public function delete($id_rak)
    {
        $this->rak->deleteData($id_rak);
    }
}
