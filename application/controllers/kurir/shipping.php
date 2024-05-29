<?php
class Shipping extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != 3) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Tidak Mempunyai Akses Kesana Silahkan Login Terlebih Dahulu</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['pesanan'] = $this->model_pesanan->tampil_data();
        $this->load->view('templates_kurir/header');
        $this->load->view('templates_kurir/sidebar');
        $this->load->view('kurir/shipping', $data);
        $this->load->view('templates_kurir/footer');
    }
    public function detail($id_pesanan)
    {
        $data['pesanan'] = $this->model_pesanan->ambil_id_pesanan($id_pesanan);
        $data['dtl_pesanan'] = $this->model_pesanan->ambil_id_detail_pesanan($id_pesanan);

        $this->load->view('templates_kurir/header');
        $this->load->view('templates_kurir/sidebar');
        $this->load->view('kurir/detail_shipping', $data);
        $this->load->view('templates_kurir/footer');
    }
    public function terima_orderan($id)
    {
        // Perbarui status pengiriman di database menjadi "Sudah Dikirim"
        $this->model_pesanan->updateStatusPengiriman_kurir($id, 'dikirim');

        // Redirect kembali ke halaman pengiriman
        redirect('kurir/shipping');
    }
    public function orderan_sampai($id)
    {
        // Perbarui status pengiriman di database menjadi "Sudah Dikirim"
        $this->model_pesanan->updateStatusPengiriman_kurir2($id, 'sampai');

        // Redirect kembali ke halaman pengiriman
        redirect('kurir/shipping');
    }
}
