<?php

class List_model extends CI_model
{

    public function getAccount()
    {
        $this->db->select('*', 'count(id)');
        $this->db->from('daftar_akun');

        return $this->db->get();
    }
    public function getAllAccount($limit, $start)
    {
        return $this->db->get('daftar_akun', $limit, $start)->result_array();
    }

    public function getAllAccountSuspended($limit, $start)
    {
        return $this->db->get('daftar_akun_suspended', $limit, $start)->result_array();
    }

    public function countAllAccount()
    {
        return $this->db->get('daftar_akun')->num_rows();
    }

    public function countAllAccountSuspended()
    {
        return $this->db->get('daftar_akun_suspended')->num_rows();
    }

    public function hapusAccount($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('daftar_akun', ['id' => $id]);
    }

    public function hapusAccountSuspended($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('daftar_akun_suspended', ['id' => $id]);
    }

    public function tambahAccount()
    {
        $data = [
            "stbid" => $this->input->post('stbid', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "type" => $this->input->post('type', true),
            "total_all_channel" => $this->input->post('total_all_channel', true),
            "channel_active" => $this->input->post('channel_active', true),
            "status" => $this->input->post('status', true)
        ];

        $this->db->insert('daftar_akun', $data);
    }

    public function tambahAccountSuspended()
    {
        $data = [
            "stbid" => $this->input->post('stbid', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "type" => $this->input->post('type', true)
        ];

        $this->db->insert('daftar_akun_suspended', $data);
    }

    public function cariAccount()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->or_like('stbid', $keyword);
        $this->db->or_like('username', $keyword);
        $this->db->or_like('status', $keyword);

        return $this->db->get('daftar_akun')->result_array();
    }

    public function cariAccountSuspended()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->or_like('stbid', $keyword);
        $this->db->or_like('username', $keyword);
        // $this->db->or_like('status', $keyword);

        return $this->db->get('daftar_akun_suspended')->result_array();
    }

    public function ubahAccount()
    {
        $data = [
            "id" => $this->input->post('id', true),
            "stbid" => $this->input->post('stbid', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "type" => $this->input->post('type', true),
            "total_all_channel" => $this->input->post('total_all_channel', true),
            "channel_active" => $this->input->post('channel_active', true),
            "status" => $this->input->post('status', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('daftar_akun', $data);
    }

    public function ubahAccountSuspended()
    {
        $data = [
            "stbid" => $this->input->post('stbid', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "type" => $this->input->post('type', true),
            "status" => $this->input->post('status', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('daftar_akun_suspended', $data);
    }
}