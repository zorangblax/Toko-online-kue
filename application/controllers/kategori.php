<?php
class kategori extends CI_Controller
{
    public function elektronik()
    {
        $data['elektronik'] = $this->model_kategori->data_elektronik()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kategori/elektronik', $data);
        $this->load->view('templates/footer');
    }

    public function pakaian_pria()
    {
        $data['pakaian_pria'] = $this->model_kategori->data_pakaian_pria()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kategori/pakaian_pria', $data);
        $this->load->view('templates/footer');
    }
}
