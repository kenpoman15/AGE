<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->view('Templates/header.php');
    $this->load->helper('url_helper');
    $this->load->library('session');
    $this->load->helper('form');
    $this->load->model('Pages_Model');
  }
  public function index()
  {
    // $this->load->view("Templates/login");
  }

  public function Login(){
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Login';


    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');


    if ($this->form_validation->run() === FALSE)
    {

        $this->load->view('Templates/login');
    }
    else
    {
        $user = $this->User_Model->get_user_by_usn($this->input->post("username"));
        //$user  = $this->User_Model->get_user_by_usn($this->input->post("username"));
        if(password_verify($this->input->post("password"),$user['password']))
        {
            $this->session->set_userdata($user);
            redirect(site_url());
        }
        else
        {
            $this->load->view('templates/header', $data);
            $this->load->view('hootuser/login');
            $this->load->view('templates/footer');
        }
    }

  }//login

  public function logout(){
    session_destroy();
    $this->load->view("home");
  }









}
