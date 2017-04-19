<?php
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->library('cart');
    }

    public function index()
    {
        show_404();
    }


    public function login()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Login';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('User/login');
            $this->load->view('templates/footer');

        }
        else
        {
            $user  = $this->User_Model->get_user_by_usn($this->input->post("username"));
            if(password_verify($this->input->post("password"),$user['password']))
            {
                $img_path = $this->User_Model->get_user($user['id']);
                $user['img_path'] = $img_path['img_path'];
                $this->session->set_userdata($user);
                redirect(site_url('Chirp/Profile/'.$_SESSION['id']));
            }
            else
            {
                $this->load->view('templates/header', $data);
                $this->load->view('User/login');
                $this->load->view('templates/footer');
            }
        }

    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(site_url('User/login'));
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('User/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->User_Model->set_user();
            $user  = $this->User_Model->get_user_by_usn($this->input->post("username"));
            $this->session->set_userdata($user);
            redirect(site_url('Chirp/Profile/'.$_SESSION['id']));
        }
    }



}
