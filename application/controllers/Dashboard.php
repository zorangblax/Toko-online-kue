<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != 2) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login Silahkan Login Terlebih Dahulu!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }



    public function tambah_ke_keranjang($id)
    {
        $barang = $this->model_barang->find($id);
        $user_id = $this->session->userdata('id');
        // Cek apakah barang sudah ada dalam keranjang pengguna
        $keranjang = $this->db->get_where('keranjang_belanja', array('id_user' => $user_id, 'id_brg' => $barang->id_brg))->row();
        if ($keranjang) {
            // Jika barang sudah ada, tambahkan jumlahnya
            $data = array(
                'qty'   => $keranjang->qty + 1
            );
            $this->db->where('id', $keranjang->id);
            $this->db->update('keranjang_belanja', $data);
        } else {
            $data = array(
                'id_user' => $user_id,
                'id_brg' => $barang->id_brg,
                'qty'     => 1,
                'harga'   => $barang->harga,
                'nama_barang'    => $barang->nama_brg
            );
            $this->db->insert('keranjang_belanja', $data);
        }
        if ($barang->stok > 0) {
            $this->db->set('stok', 'stok-1', FALSE);
            $this->db->where('id_brg', $barang->id_brg);
            $this->db->update('tb_barang');
        }

        redirect('home');
    }
    public function detail_keranjang()
    {
        // Ambil ID pengguna dari session
        $user_id = $this->session->userdata('id');

        // Query untuk mengambil data keranjang belanja pengguna dari database
        $query = $this->db->get_where('keranjang_belanja', array('id_user' => $user_id));

        // Memeriksa apakah ada data keranjang
        if ($query->num_rows() > 0) {
            // Jika ada, simpan data ke dalam array $keranjang
            $keranjang = $query->result_array();
        } else {
            // Jika tidak ada, inisialisasikan $keranjang sebagai array kosong
            $keranjang = array();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/keranjang', array('keranjang' => $keranjang));
        $this->load->view('templates/footer');
    }

    public function hapus_item_keranjang($id_keranjang)
    {
        // Ambil data keranjang berdasarkan ID
        $keranjang = $this->db->get_where('keranjang_belanja', array('id' => $id_keranjang))->row();

        if ($keranjang) {
            // Kurangi quantity di keranjang belanja
            if ($keranjang->qty > 1) {
                $this->db->set('qty', 'qty-1', FALSE);
                $this->db->where('id', $id_keranjang);
                $this->db->update('keranjang_belanja');
            } else {
                // Jika quantity di keranjang = 1, hapus item dari keranjang
                $this->db->delete('keranjang_belanja', array('id' => $id_keranjang));
            }

            // Tambahkan kembali stok barang
            $this->db->set('stok', 'stok+1', FALSE);
            $this->db->where('id_brg', $keranjang->id_brg);
            $this->db->update('tb_barang');
        }

        // Redirect kembali ke halaman keranjang belanja
        redirect('dashboard/detail_keranjang');
    }


    public function hapus_keranjang()
    {
        // Ambil ID pengguna dari session
        $user_id = $this->session->userdata('id');

        // Ambil semua item keranjang pengguna dari database
        $keranjang = $this->db->get_where('keranjang_belanja', array('id_user' => $user_id))->result();

        // Perbarui stok barang
        foreach ($keranjang as $item) {
            $this->db->set('stok', 'stok+' . $item->qty, FALSE);
            $this->db->where('id_brg', $item->id_brg);
            $this->db->update('tb_barang');
        }

        // Hapus semua item keranjang pengguna
        $this->db->delete('keranjang_belanja', array('id_user' => $user_id));

        // Redirect kembali ke halaman keranjang belanja
        redirect('home');
    }


    public function pembayaran()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/pembayaran');
        $this->load->view('templates/footer');
    }

    public function proses_pesanan()
    {
        $is_proceessed = $this->model_pesanan->index();
        if ($is_proceessed) {

            $this->cart->destroy();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('user/proses_pesanan');
            $this->load->view('templates/footer');
        } else {
            echo "Maaf Pesanan Anda Gagal di proses";
        }
    }
    public function detail($id_brg)
    {
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/detail_barang', $data);
        $this->load->view('templates/footer');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['barang'] = $this->model_barang->ambil_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
