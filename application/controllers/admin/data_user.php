<?php
class Data_user extends CI_Controller
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
    $data['users'] = $this->model_edit_user->get_all_users();
    $data['title'] = 'Data User';
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_user', $data);
    $this->load->view('templates_admin/footer');
  }
  public function edit_user($user_id)
  {
    $data['user'] = $this->model_edit_user->get_user_by_id($user_id);
    $data['title'] = 'Edit User';
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/edit_data_user', $data);
    $this->load->view('templates_admin/footer');
  }
  public function proses_edit_user()
  {
    // Tangkap data dari form
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    // Dapatkan ID pengguna yang akan diedit dari form atau URL, sesuaikan dengan cara Anda menentukan ID pengguna
    $user_id = $this->input->post('user_id');

    // Panggil model untuk memperbarui data pengguna
    $this->model_edit_user->update_user($user_id, $username, $password);

    // Setelah data diperbarui, arahkan kembali pengguna ke halaman dashboard atau halaman lain yang sesuai
    redirect('admin/data_user');
  }

  public function tambahuser()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => 'Nama Wajib di isi']);
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat Wajib di isi']);
    $this->form_validation->set_rules('no_telp', 'No telp', 'required', ['required' => 'No Telp Wajib di isi']);
    $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email Wajib di isi']);
    $this->form_validation->set_rules('password_1', 'Password_1', 'required|matches[password_2]', ['required' => 'Password Wajib di isi', 'matches' => 'Password tidak cocok']);
    $this->form_validation->set_rules('password_2', 'Password_2', 'required|matches[password_1]');
    $this->form_validation->set_rules('role', 'Role', 'required', ['required' => 'Role harus di isi']);
    if ($this->form_validation->run() == false) {
      $this->load->view('templates_admin/header');
      $this->load->view('templates_admin/sidebar');
      $this->load->view('admin/tambah_user');
      $this->load->view('templates_admin/footer');
    } else {
      $data = array(
        'id' => '',
        'nama' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'no_telp' => $this->input->post('no_telp'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password_1'), //cara agar password ter enkripsi  password_hash($new_password, PASSWORD_DEFAULT);
        'role_id' => $this->input->post('role'),
      );
      $this->db->insert('tb_user', $data);
      redirect('admin/data_user');
    }
  }
}
