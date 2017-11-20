<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Fotografia ślubna i filmowanie';

        $this->load->model('photos');
        $data['photos'] = $this->photos->get_photos();

        $this->load->model('videos');
        $data['videos'] = $this->videos->get_videos();

        $this->load->view('template/header', $data);
        $this->load->view('template/nav');
        $this->load->view('top', $data);
        $this->load->view('video', $data);
        $this->load->view('album');
        $this->load->view('about');
//        $this->load->view('prices');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'imię', 'required');
//        $this->form_validation->set_rules('date', 'data', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('message', 'wiadomość', 'required');
        $this->form_validation->set_message('required', 'Pole {field} wymagane!');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('contact');
            $this->load->view('phone_email');
        } else {
            $content = 'Tresc: ' . $this->input->post('message');
            $phone = $this->input->post('phone');
            $date = $this->input->post('date');

            $fotoreportaz = $this->input->post('fotoreportaz');
            $foto_poprawiny = $this->input->post('foto_poprawiny');
            $foto_makijaz = $this->input->post('foto_makijaz');
            $foto_plener = $this->input->post('foto_plener');

            $videoreportaz = $this->input->post('videoreportaz');
            $video_poprawiny = $this->input->post('video_poprawiny');
            $video_makijaz = $this->input->post('video_makijaz');
            $video_podziekowania = $this->input->post('video_podziekowania');

            if (!empty($phone)) {
                $content = $content . ' Telefon: ' . $phone . ', ';
            }
            if (!empty($date)) {
                $content = $content . ' Data: ' . $date . ', ';
            }

            if (!empty($fotoreportaz)) {
                $content = $content . ' Fotoreportaż: tak,';
            }
            if (!empty($foto_poprawiny)) {
                $content = $content . ' Fotografowanie na poprawinach: tak,';
            }
            if (!empty($foto_makijaz)) {
                $content = $content . ' Fotografowanie na makijażu: tak,';
            }
            if (!empty($foto_plener)) {
                $content = $content . ' Plener w inny dzień: tak,';
            }

            if (!empty($videoreportaz)) {
                $content = $content . ' Videoreportaż: tak,';
            }
            if (!empty($video_poprawiny)) {
                $content = $content . ' Filmowanie na poprawinach: tak,';
            }
            if (!empty($video_makijaz)) {
                $content = $content . ' Filmowanie na makijażu: tak,';
            }
            if (!empty($video_podziekowania)) {
                $content = $content . ' Podziękowania dla rodziców: tak,';
            }

            $this->load->library('email');

            //configuration
            $config['protocol'] = 'smtp';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['smtp_host'] = 'ssl://s20.ehost.pl';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'kontakt@wojot.pl';
            $config['smtp_pass'] = 'wojtek11';
            $config['charset'] = 'utf-8';


            $this->email->initialize($config);

            $this->email->from($this->input->post('email'), $this->input->post('name'));
            $this->email->to('wojotek@gmail.com');

            $this->email->subject('Wiadomosc slubnapamiatka.eu');

            $this->email->message($content);

            if (!$this->email->send()) {
                echo 'Błąd wysyłania wiadomości, prosimy spróbować później.';
                exit;
            }



            $this->load->view('formsuccess');
            $this->load->view('phone_email');
        }

        $this->load->view('template/footer');
    }
}
