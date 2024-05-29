<?php
class Model_edit_user extends CI_Model
{
    public function index()
    {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
        $user_id = $this->session->userdata('id');

        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
        );
        $this->db->where('id', $user_id);
        $this->db->update('tb_user', $data);

        $this->session->set_userdata('nama', $nama);
        $this->session->set_userdata('alamat', $alamat);
        $this->session->set_userdata('no_telp', $no_telp);

        return true;
    }
    public function change_password()
    {
        // Ambil data dari form
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $user_id = $this->session->userdata('id');

        // Ambil password dari database berdasarkan user ID
        $query = $this->db->get_where('tb_user', array('id' => $user_id));
        $user = $query->row();

        // Periksa apakah password lama cocok dengan yang ada di database
        if ($old_password == $user->password) {    //dan cara membandingkan password yang terenkripsi menggunakan password_verify cth:password_verify($old_password, $user->password)
            // Jika cocok, update password baru
            $data = array(
                'password' => $new_password // cara agar password terenkripsi  $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            );
            $this->db->where('id', $user_id);
            $this->db->update('tb_user', $data);
            return true;
        } else {
            // Jika tidak cocok, kembalikan false
            return false;
        }
    }

    public function get_all_users()
    {
        return $this->db->get('tb_user')->result_array();
    }
    public function get_user_by_id($user_id)
    {
        return $this->db->get_where('tb_user', array('id' => $user_id))->row_array();
    }
    public function update_user($user_id, $username, $password)
    {
        // Data yang akan diupdate
        $data = array(
            'username' => $username,
            'password' => $password
            // Tambahkan field lain yang ingin diupdate jika diperlukan
        );

        // Lakukan proses update ke dalam database
        $this->db->where('id', $user_id);
        $this->db->update('tb_user', $data);
    }
}
