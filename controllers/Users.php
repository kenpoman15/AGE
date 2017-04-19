<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library('session');
    $this->load->helper('url_helper');
    $this->load->helper('form');
    $this->load->model('User_Model');

  }

  public function index()
  {
    $this->load->view('Templates/header.php');
    $this->load->view("Templates/login");
  }
  public function login()
  {
    $this->load->library('form_validation');
    $data['title'] = 'Login';
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('Templates/header.php');
        $this->load->view('Templates/login');
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $Verify =	$this->User_Model->Verify($username,$password); 	//Verify w/ Verify function in Login model
      if($Verify == TRUE){
        echo "verified";
        redirect(site_url());//redirect to home after verification
      } else{
        $this->load->view('Templates/header.php');
        $this->load->view('Templates/login');
        echo "not verified";
      }
    }
  }//login
  public function logout(){
    $this->session->sess_destroy();
    $this->load->view('Templates/header.php');
    $this->load->view("home");
  }

  public function createUser()
  {
    $this->load->view("Templates/header.php");
    $this->load->view("Templates/newuser.php");
  }

  public function sendUser()
  {
    $user = $_POST;
    $user = $this->User_Model->insertUser($user);

    $this->load->view("Templates/header.php");
    $this->load->view("home");
  }
}
