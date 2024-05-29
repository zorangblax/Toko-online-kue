<?php
class Shipping extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != 2) {
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
        // Ambil ID dari session
        $user_id = $this->session->userdata('id');

        // Panggil method dari model untuk mengambil data berdasarkan ID dari session
        $data['records'] = $this->model_pesanan->get_data_by_user_id($user_id);

        // Load view dan kirim data ke view
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/shipping', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_history)
    {
        $data['history'] = $this->model_pesanan->ambil_id_history($id_history);
        $data['pesanan'] = $this->model_pesanan->ambil_id_history_detail($id_history);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/detail_shipping', $data);
        $this->load->view('templates/footer');
    }

    public function terima_pesanan($id)
    {
        // Perbarui status pengiriman di database menjadi "Sudah Dikirim"
        $this->model_pesanan->updateStatusPengiriman($id, 'Terima Pesanan');

        // Redirect kembali ke halaman pengiriman
        redirect('shipping');
    }

    public function hapus($id)
    {
        $this->model_pesanan->hapushistory($id);
        redirect('shipping');
    }
    public function ubah_metode_pembayaran()
    {
        $where = $this->input->post('idpsn');
        $ubah_metode = $this->input->post('ubahmetode');
        $this->model_pesanan->ubah_metode_pembayaran($where, $ubah_metode);
        redirect('shipping');
    }
}
