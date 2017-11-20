<?php

class Panel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_customer($name, $photo_link, $video_link, $photo_name)
    {
        $data_to_insert = array(
            'name' => $name,
            'photo_link' => $photo_link,
            'video_link' => $video_link,
            'photo_name' => $photo_name,
        );

        if ($this->db->insert('panel', $data_to_insert)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_customer($name)
    {
        $this->db->where('name', $name);
        $query = $this->db->get('panel');
        return $query->result();
    }
}