<?php

class Settings_model extends CI_model
{
    public function setTitle()
    {
        $data = [
            "title" => $this->input->post('title', true),
        ];

        $this->db->where('id', '1');
        $this->db->update('pengaturan', $data);
    }
}
