<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ListAccountSuspended extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $this->load->model('list_model');

        $data['title'] = $this->db->get_where('pengaturan')->row_array();
        $data['subtitle'] = 'List Account Suspended';

        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('stbid', 'STBID', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|numeric');
        $this->form_validation->set_rules('type', 'Type', 'required');
        // $this->form_validation->set_rules('total_allchannel', 'Total All Channel', 'required|numeric');
        // $this->form_validation->set_rules('channel_active', 'Channel Active', 'required|numeric');
        // $this->form_validation->set_rules('status', 'Status', 'required');

        //Pagination
        //Configurasi
        $config['base_url'] = 'http://localhost/useetv/listaccountsuspended/index/';
        $config['total_rows'] = $this->list_model->countAllAccountSuspended();
        $config['per_page'] = 5;

        //Pemodelan
        $config['full_tag_open'] = '<nav aria-label="Pagination"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</nav></ul>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        //Inisialisasi
        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(3);
        $data['account'] = $this->list_model->getAllAccountSuspended($config['per_page'], $data['start']);
        if ($this->input->post('keyword')) {
            $data['account'] = $this->list_model->cariAccountSuspended();
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('list-account-suspended/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->list_model->tambahAccountSuspended();
            $this->session->set_flashdata('flash', 'Added');
            redirect('listaccountsuspended');
        }
    }

    public function hapus($id)
    {

        is_logged_in();

        if ($data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array()) {
            $this->list_model->hapusAccountSuspended($id);
            $this->session->set_flashdata('flash', 'Deleted');
            redirect('listaccountsuspended');
        } else {
            redirect('auth');
        }
    }
}
