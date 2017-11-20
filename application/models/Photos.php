<?php

class Photos extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_photo($name, $order)
    {
        $data_to_insert = array(
            'name' => $name,
            'order' => $order,
        );

        $this->db->insert('photos', $data_to_insert);
    }

    public function get_max_order()
    {
        $this->db->select_max('order');
        $query = $this->db->get('photos');
        $result = $query->result();
        return $result[0]->order;
    }

    public function get_photos()
    {
        $this->db->order_by('order', 'ASC');
        $query = $this->db->get('photos');
        return $query->result();
    }

    public function delete($name)
    {
        $this->db->where('name', $name);
        if ($this->db->delete('photos')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function refresh_order()
    {
        $this->db->order_by('order', 'ASC');
        $query = $this->db->get('photos');

        $photos = $query->result();
        foreach ($photos as $photo) {
            static $i = 1;
            $this->db->set('order', $i);
            $this->db->where('id_photo', $photo->id_photo);
            $this->db->update('photos');
            $i++;
        }
    }

    public function updateOrder($id_array)
    {
        $count = 1;
        foreach ($id_array as $id){
            $this->db->set('order', $count);
            $this->db->where('id_photo', $id);
            $this->db->update('photos');

            $count ++;
        }
        return true;
    }
}