<?php
class kategori extends CI_Controller
{
    public function bolu()
    {
        $data['bolu'] = $this->model_kategori->data_bolu()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kategori/bolu', $data);
        $this->load->view('templates/footer');
    }

    public function donat()
    {
        $data['donat'] = $this->model_kategori->data_donat()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kategori/donat', $data);
        $this->load->view('templates/footer');
    }
    public function cake()
    {
        $data['cake'] = $this->model_kategori->data_cake()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kategori/cake', $data);
        $this->load->view('templates/footer');
    }
    public function idul_fitri()
    {
        $data['idul_fitri'] = $this->model_kategori->data_idul_fitri()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kategori/idul_fitri', $data);
        $this->load->view('templates/footer');
    }
}
