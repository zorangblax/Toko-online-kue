<?php
class Auth extends CI_Controller
{
    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email Wajib di isi']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password Wajib di isi']);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('auth/form_login');
            $this->load->view('templates/footer');
        } else {
            $auth = $this->model_auth->cek_login();
            if ($auth == false) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Email atau password Anda Salah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('id', $auth->id);
                $this->session->set_userdata('email', $auth->email);
                $this->session->set_userdata('nama', $auth->nama);
                $this->session->set_userdata('alamat', $auth->alamat);
                $this->session->set_userdata('no_telp', $auth->no_telp);
                $this->session->set_userdata('role_id', $auth->role_id);

                switch ($auth->role_id) {
                    case 1:
                        redirect('admin/data_user');
                        break;
                    case 2:
                        redirect('home');
                        break;
                    case 3:
                        redirect('kurir/shipping');
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
