<?php
class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Kingdom Cake';
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('user/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
