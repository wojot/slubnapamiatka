<?php

class Profil extends CI_Controller
{
    public function index()
    {

        $name = $this->uri->segment(2);
        $data['title'] = 'Strefa klienta - '.$this->uri->segment(2);

        $this->load->model('panel');
        $data['profil'] = $this->panel->get_customer($name);


        $this->load->view('profil/header', $data);
        $this->load->view('profil/main', $data);
        $this->load->view('profil/footer');
    }
//
//    public function delete()
//    {
//        $this->load->model('videos');
//        if ($this->videos->delete($this->uri->segment(3))) {
//            redirect(base_url('admin'));
//
//        } else {
//            echo 'blad usuwania z bazy';
//        }
//    }
}