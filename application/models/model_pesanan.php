<?php
class model_pesanan extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
        $pembayaran = $this->input->post('pembayaran');
        $status = $this->input->post('status');

        $pesanan = array(
            'id_user' => $id_user,
            'nama' => $nama,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'pembayaran' => $pembayaran,
            'status' => $status,

        );
        $this->db->insert('pesanan', $pesanan);
        $this->db->insert('history', $pesanan);


        $id_pesanan = $this->db->insert_id();
        $query = $this->db->get_where('keranjang_belanja', array('id_user' => $id_user));
        $keranjang = $query->result_array();
        foreach ($keranjang as $item) {
            $data = array(
                'id_pesanan' => $id_pesanan,
                'id_brg' => $item['id_brg'],
                'nama_brg' => $item['nama_barang'],
                'jumlah' => $item['qty'],
                'harga' => $item['harga']
            );
            $this->db->insert('detail_pesanan', $data);
            $history_data = array(
                'id_history' => $id_pesanan, // Assuming id_history is related to the order id
                'id_brg' => $item['id_brg'],
                'nama_brg' => $item['nama_barang'],
                'jumlah' => $item['qty'],
                'harga' => $item['harga']
            );
            $this->db->insert('history_detail', $history_data);
        }
        $this->db->where('id_user', $id_user);
        $this->db->delete('keranjang_belanja');
        return true;
    }

    public function tampil_data()
    {
        $result = $this->db->get('pesanan');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function tampil_data_temp()
    {
        $result = $this->db->get('history');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function ambil_id_pesanan($id_pesanan)
    {
        $result = $this->db->where('id', $id_pesanan)->limit(1)->get('pesanan');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function ambil_id_history($id_history)
    {
        $result = $this->db->where('id', $id_history)->limit(1)->get('history');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function ambil_id_detail_pesanan($id_pesanan)
    {
        $result = $this->db->where('id_pesanan', $id_pesanan)->get('detail_pesanan');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function ambil_id_history_detail($id_history)
    {
        $result = $this->db->where('id_history', $id_history)->get('history_detail');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function get_data_by_user_id($user_id)
    {
        // Ambil data dari database berdasarkan ID user
        $query = $this->db->get_where('history', array('id_user' => $user_id));
        return $query->result(); // Mengembalikan hasil query sebagai array objek
    }

    public function updateStatusPengiriman($id, $status)
    {
        // Lakukan pembaruan status pengiriman berdasarkan ID invoice
        $this->db->where('id', $id);
        $this->db->update('history', array('status' => $status));
        $this->db->where('id', $id);
        $this->db->update('pesanan', array('status' => $status));
    }
    public function updateStatusPengiriman_kurir($id, $status)
    {
        // Lakukan pembaruan status pengiriman berdasarkan ID invoice
        $this->db->where('id', $id);
        $this->db->update('history', array('status' => $status));
        $this->db->where('id', $id);
        $this->db->update('pesanan', array('status' => $status));
    }
    public function updateStatusPengiriman_kurir2($id, $status)
    {
        // Lakukan pembaruan status pengiriman berdasarkan ID invoice
        $this->db->where('id', $id);
        $this->db->update('history', array('status' => $status));
        $this->db->where('id', $id);
        $this->db->update('pesanan', array('status' => $status));
    }

    public function hapushistory($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('history');

        $this->db->where('id_history', $id);
        $this->db->delete('history_detail');
    }


    public function total_harga()
    {
        $query = $this->db->select('SUM(jumlah * harga) as total')->get('detail_pesanan');
        return $query->row()->total;
    }
    public function ubah_metode_pembayaran($where, $ubah_metode)
    {
        $data = array(
            'pembayaran' => $ubah_metode
        );
        $this->db->where('id', $where);
        $this->db->update('pesanan', $data);
        $this->db->where('id', $where);
        $this->db->update('history', $data);
    }
    public function hapuslaporan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pesanan');

        $this->db->where('id_pesanan', $id);
        $this->db->delete('detail_pesanan');
    }
}
