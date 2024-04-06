<?php
class Registrasi extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => 'Nama Wajib di isi']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat Wajib di isi']);
        $this->form_validation->set_rules('no_telp', 'No telp', 'required', ['required' => 'No Telp Wajib di isi']);
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username Wajib di isi']);
        $this->form_validation->set_rules('password_1', 'Password_1', 'required|matches[password_2]', ['required' => 'Password Wajib di isi', 'matches' => 'Password tidak cocok']);
        $this->form_validation->set_rules('password_2', 'Password_2', 'required|matches[password_1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('auth/registrasi');
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'id' => '',
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password_1'),
                'role_id' => 2,
            );
            $this->db->insert('tb_user', $data);
            redirect('auth/login');
        }
    }
}
