<?php
class Edit_profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != 2 && $this->session->userdata('role_id') != 1 && $this->session->userdata('role_id') != 3) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login Silahkan Login Terlebih Dahulu!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['title'] = 'Edit Profile';
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/edit_user');
        $this->load->view('templates/footer');
    }
    public function kurir()
    {
        $data['title'] = 'Kurir';
        $this->load->view('templates_kurir/header');
        $this->load->view('templates_kurir/sidebar');
        $this->load->view('kurir/edit_user_kurir');
        $this->load->view('templates_kurir/footer');
    }
    public function proses_edit_user()
    {
        $this->model_edit_user->index();
        redirect('edit_profile');
    }
    public function proses_edit_kurir()
    {
        $this->model_edit_user->index();
        redirect('edit_profile/kurir');
    }
    public function change_password()
    {
        // Set rules untuk validasi form
        $this->form_validation->set_rules('old_password', 'Old Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('repeat_password', 'Repeat Password', 'required|matches[new_password]', ['matches' => 'Password tidak cocok']);

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman form dengan pesan kesalahan
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('user/change_password');
            $this->load->view('templates/footer');
        } else {
            // Panggil method index pada model Model_change_password untuk mengubah password

            $change_password = $this->model_edit_user->change_password();

            if ($change_password) {
                // Jika password berhasil diubah, tampilkan pesan sukses
                $this->session->set_flashdata('success', 'Password berhasil diubah.');
            } else {
                // Jika password gagal diubah, tampilkan pesan error
                $this->session->set_flashdata('gagal', 'Password lama salah.');
            }
            redirect('edit_profile/change_password');
        }
    }

    public function change_password_kurir()
    {
        // Set rules untuk validasi form
        $this->form_validation->set_rules('old_password', 'Old Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('repeat_password', 'Repeat Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman form dengan pesan kesalahan
            $this->load->view('templates_kurir/header');
            $this->load->view('templates_kurir/sidebar');
            $this->load->view('kurir/change_password_kurir');
            $this->load->view('templates_kurir/footer');
        } else {
            // Panggil method index pada model Model_change_password untuk mengubah password

            $change_password = $this->model_edit_user->change_password();

            if ($change_password) {
                // Jika password berhasil diubah, tampilkan pesan sukses
                $this->session->set_flashdata('success', 'Password berhasil diubah.');
            } else {
                // Jika password gagal diubah, tampilkan pesan error
                $this->session->set_flashdata('gagal', 'Password lama salah.');
            }
            redirect('edit_profile/change_password_kurir');
        }
    }
}
