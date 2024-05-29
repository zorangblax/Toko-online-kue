<?php
class laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Tidak Mempunyai Akses Kesana</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('home');
        }
    }
    public function index()
    {
        $data['total_harga'] = $this->model_pesanan->total_harga();
        $data['laporan'] = $this->model_pesanan->tampil_data();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates_admin/footer');
    }
    public function detail($id_pesanan)
    {
        $data['pesanan'] = $this->model_pesanan->ambil_id_pesanan($id_pesanan);
        $data['detail'] = $this->model_pesanan->ambil_id_detail_pesanan($id_pesanan);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_laporan', $data);
        $this->load->view('templates_admin/footer');
    }
    public function update_status($id)
    {
        // Perbarui status pengiriman di database menjadi "Sudah Dikirim"
        $this->model_pesanan->updateStatusPengiriman($id, 'Proses');

        // Redirect kembali ke halaman pengiriman
        redirect('admin/laporan');
    }
    public function hapus($id)
    {
        $this->model_pesanan->hapuslaporan($id);
        redirect('admin/laporan');
    }
}
