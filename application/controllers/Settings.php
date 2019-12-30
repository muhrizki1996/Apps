<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = $this->db->get_where('pengaturan')->row_array();
        $data['subtitle'] = 'Pengaturan';

        $this->load->model('Settings_model');

        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('title', 'Nama Aplikasi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('settings/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Settings_model->setTitle();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Site title (Nama aplikasi) berhasil diganti!</div>');
            redirect('settings');
        }
    }

    public function changepass()
    {
        $data['title'] = $this->db->get_where('pengaturan')->row_array();
        $data['subtitle'] = 'Ganti Password';

        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Saat Ini', 'required|trim');
        $this->form_validation->set_rules('password', 'Password Baru', 'required|trim|min_length[5]|matches[confirmpassword]');
        $this->form_validation->set_rules('confirmpassword', 'Konfirmasi Password Baru', 'required|trim|min_length[5]|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('settings/changepass', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('password');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password saat ini salah!</div>');
                redirect('settings/changepass');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru, tidak boleh sama dengan yang saat ini!</div>');
                    redirect('settings/changepass');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('admin');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diganti!</div>');
                    redirect('settings/changepass');
                }
            }
        }
    }
}
