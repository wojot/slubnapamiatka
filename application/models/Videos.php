<?php

class Videos extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_video($link)
    {
        $data_to_insert = array(
            'link' => $link,
        );

        if ($this->db->insert('videos', $data_to_insert)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_videos()
    {
        $this->db->order_by('id_video', 'DESC');
        $query = $this->db->get('videos');
        return $query->result();
    }

    public function delete($id)
    {
        $this->db->where('id_video', $id);
        if ($this->db->delete('videos')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}