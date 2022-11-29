<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('HomeModel', 'home');
    }
    public function index()
    {
        if($this->session->login != true){
            $this->load->view('index');
        }else{
            $users = $this->home->getCUser();
            $books = $this->home->getCBook();
            $pinjam = $this->home->getCPinjam();
            $this->load->view('admin/dashboard.php',[
                'users' => $users,
                'books' => $books,
                'pinjam' => $pinjam
            ]);
        }
    }
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = [
            'username' => $username,
            'password' => md5($password)
        ];

        $this->home->login($data);
    }
    public function logout()
    {
        $this->home->logout();
    }
}
