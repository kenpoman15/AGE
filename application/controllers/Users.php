<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library('session');
    $this->load->library('encryption');
    $this->load->helper('url_helper');
    $this->load->helper('form');
    $this->load->model('User_Model');


  }

  public function index()
  {
    $this->load->view('Templates/header.php');
    $this->load->view("Templates/login");
      $this->load->view('Templates/footer.php');
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
        $this->load->view('Templates/footer.php');
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $Verify =	$this->User_Model->Verify($username,$password); 	//Verify w/ Verify function in Login model
      if($Verify == TRUE){
        redirect(site_url());//redirect to home after verification
      } else{
        $this->load->view('Templates/header.php');
        $this->load->view('Templates/login');
        $this->load->view('Templates/footer.php');
        echo "not verified";
      }
    }
  }//login
  public function logout(){
    session_unset(); 
    $this->session->sess_destroy();

  $this->load->view('Templates/header.php');
    $this->load->view("home");
    $this->load->view('Templates/footer.php');
  }

  public function createUser()
  {
    $this->load->view("Templates/header.php");
    $this->load->view("Templates/newuser.php");
    $this->load->view('Templates/footer.php');
  }

  public function sendUser()
  {
    $this->load->library('form_validation');
    $data['title'] = 'Login';

    $user = $_POST;

      $user = $this->User_Model->insertUser($user);

      $this->load->view("Templates/header.php");
      $this->load->view("home");
      $this->load->view('Templates/footer.php');

  }
}
