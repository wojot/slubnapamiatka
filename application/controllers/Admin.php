<?php

class Admin extends CI_Controller
{
    public function index()
    {
        if (!isset($this->session->userdata['is_logged'])) {
            redirect(base_url() . 'admin/login');
        }

        $data['title'] = 'Admin - Strona główna';

        $this->load->model('photos');
        $data['photos'] = $this->photos->get_photos();

        $this->load->model('videos');
        $data['videos'] = $this->videos->get_videos();

        $this->load->view('template/header', $data);
        $this->load->view('admin/main', $data);
        $this->load->view('template/footer');
    }

    public function login()
    {
        $data['title'] = 'Admin - login';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nick', 'nick', 'required');
        $this->form_validation->set_rules('password', 'hasło', 'required');
        $this->form_validation->set_message('required', 'Pole {field} musi być wypełnione!');

        if ($this->form_validation->run() == TRUE) {
            $this->load->model('Users');
            if ($this->Users->check_login($this->input->post('nick'), $this->input->post('password'))) {
                $logged = array(
                    'nick' => $this->input->post('nick'),
                    'is_logged' => TRUE
                );
                $this->session->set_userdata($logged);
                redirect(base_url() . 'admin');

            } else {
                $data['error'] = 'Błąd logowania, podałeś nieprawidłowe dane!';
            }

        }

        $this->load->view('template/header', $data);
        $this->load->view('admin/login', $data);
        $this->load->view('template/footer');
    }

    public function upload()
    {
        if (!isset($this->session->userdata['is_logged'])) {
            redirect(base_url() . 'admin/login');
        }

        $path = './uploads/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload('file');

        $this->load->model('photos');
        $this->photos->insert_photo($this->upload->data('raw_name'), $this->photos->get_max_order() + 1);
        $photo_name = $this->upload->data('raw_name');

        $config_res['image_library'] = 'gd2';
        $config_res['source_image'] = $path . $photo_name . '.jpg';
        $config_res['maintain_ratio'] = TRUE;
        $config_res['master_dim'] = 'width';
        $config_res['width'] = 1200;
        $config_res['height'] = 800;
        $this->load->library('image_lib', $config_res);
        $this->image_lib->resize();

        $config_cro['source_image'] = $path . $photo_name . '.jpg';
        $config_cro['width'] = 1200;
        $config_cro['height'] = 800;
        $config_cro['maintain_ratio'] = FALSE;
        $this->image_lib->initialize($config_cro);
        $this->image_lib->crop();

        $config_res['image_library'] = 'gd2';
        $config_res['source_image'] = $path . $photo_name . '.jpg';
        $config_res['create_thumb'] = TRUE;
        $config_res['maintain_ratio'] = TRUE;
        $config_res['thumb_marker'] = '_thumb';
        $config_res['width'] = 345;
        $config_res['height'] = 230;
        $this->image_lib->initialize($config_res);
        $this->image_lib->resize();
    }

    public function delete()
    {
        if (!isset($this->session->userdata['is_logged'])) {
            redirect(base_url() . 'admin/login');
        }

        $this->load->model('photos');
        if ($this->photos->delete($this->uri->segment(3))) {
            if (unlink(FCPATH . 'uploads/' . $this->uri->segment(3) . '.jpg')) {
                unlink(FCPATH . 'uploads/' . $this->uri->segment(3) . '_thumb.jpg');

                $this->photos->refresh_order();

                redirect(base_url('admin'));

            } else {
                echo 'blad usuwania';
            }
        } else {
            echo 'blad usuwania z bazy';
        }
    }

    public function change_order()
    {
        if (!isset($this->session->userdata['is_logged'])) {
            redirect(base_url() . 'admin/login');
        }

        $post = $this->input->post();
        asort($post);
        foreach ($post as $name => $order) {
            if ($name != 'submit') {
                $this->load->model('photos');
                $this->photos->change_order($name, $order);
            }
        }
        $this->photos->refresh_order();
        redirect('admin');
    }

    public function reorder()
    {
        if (!isset($this->session->userdata['is_logged'])) {
            redirect(base_url() . 'admin/login');
        }

        $idArray = explode(",", $_POST['ids']);
        $this->load->model('photos');
        $this->photos->updateOrder($idArray);

    }

    //videos:

    public function new_video()
    {
        if (!isset($this->session->userdata['is_logged'])) {
            redirect(base_url() . 'admin/login');
        }

        $this->load->model('videos');
        if ($this->videos->insert_video($this->input->post('link'))) {
            redirect('admin');
        } else {
            echo 'Błąd dodawania filmu';
        }
    }

    public function delete_video()
    {
        if (!isset($this->session->userdata['is_logged'])) {
            redirect(base_url() . 'admin/login');
        }

        $this->load->model('videos');
        if ($this->videos->delete($this->uri->segment(3))) {
            redirect(base_url('admin'));

        } else {
            echo 'blad usuwania z bazy';
        }
    }

    // new customer

    public function new_customer()
    {
        $config['upload_path'] = './uploads/customers';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $error = array('error' => $this->upload->display_errors());
            echo 'blad' . var_dump($error);
        } else {
            $raw_name = $this->upload->data('raw_name');

            $config_res['image_library'] = 'gd2';
            $config_res['source_image'] = './uploads/customers/' . $raw_name . '.jpg';
            $config_res['maintain_ratio'] = TRUE;
            $config_res['width'] = 1200;
            $config_res['height'] = 900;

            $this->load->library('image_lib', $config_res);

            if ($this->image_lib->resize()) {
                $this->load->model('panel');
                if ($this->input->post('video_link')) {
                    $video = $this->input->post('video_link');
                } else {
                    $video = "brak";
                }
                if ($this->input->post('photo_link')) {
                    $photo_link = $this->input->post('video_link');
                } else {
                    $photo_link = "brak";
                }
                
                if ($this->panel->add_customer($this->input->post('name'), $photo_link, $video, $raw_name)) {
                    redirect('profil/' . $this->input->post('name'));
                }
            }
        }
    }

    public function logout()
    {
        $session_items = array('nick', 'is_logged');
        $this->session->unset_userdata($session_items);
        redirect(base_url() . 'admin/login');
    }
}